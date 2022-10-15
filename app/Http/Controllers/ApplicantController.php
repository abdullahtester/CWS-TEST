<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use DataTables;

class ApplicantController extends Controller
{
    public function index(){
        return view('applicantRegister');
    }

    public function applicantCreate(Request $request){
        
        $validator = Validator::make($request->all(), [
            'first_name'  => 'required|string|between:1,100',
            'last_name'   => 'string|nullable|between:1,100',
            'phone'       => 'string|nullable|digits:10',
            'email'       => 'required|email|unique:applicants,email',
            'address'     => 'string|nullable',
            'dob'         => 'string|nullable|date_format:m/d/Y|before:'.now()->subYears(18)->toDateString(),
            'gender'      => 'string|nullable',
            'resume'      => 'mimes:docx,pdf|max:2048',
            'applicant_photo' => 'mimes:png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()->all()]);
        }

        $validated = $validator->validated();

        $create = [
            "first_name"    => isset($validated["first_name"])     ? $validated["first_name"] : null,
            "last_name"     => isset($validated["last_name"])      ? $validated["last_name"] : null,
            "phone"         => isset($validated["phone"])          ? $validated["phone"] : null,
            "email"         => isset($validated["email"])          ? $validated["email"] : null,
            "address"       => isset($validated["address"])        ? $validated["address"] : null,
            "dob"           => isset($validated["dob"])            ? $validated["dob"] : null,
            "gender"        => isset($validated["gender"])         ? $validated["gender"] : null,
        ];

        if ($request->hasfile('resume')) {

            $resume  =  $request->file('resume');
            $create["resume"] = $resume->store('resume');    
        }

        if ($request->hasfile('applicant_photo')) {

            $resume  =  $request->file('applicant_photo');
            $create["applicant_photo"] = $resume->store('photo');    
        }

        $create["added_by"] = 1;
        $create["added_at"] = now();



        Applicant::create($create);

        return response()->json(['success'=>'Applicant Register Success!']);

    }

    public function applicantUpdate(Request $request, $id){
        
        $validator = Validator::make($request->all(), [
            'first_name'  => 'required|string|between:1,100',
            'last_name'   => 'string|nullable|between:1,100',
            'phone'       => 'string|nullable|digits:10',
            'email'       => 'required|email|unique:applicants,email',
            'address'     => 'string|nullable',
            'dob'         => 'string|nullable|date_format:m/d/Y|before:'.now()->subYears(18)->toDateString(),
            'gender'      => 'string|nullable',
            'resume'      => 'nullable|mimes:docx,pdf|max:2048',
            'applicant_photo' => 'nullable|mimes:png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()->all()]);
        }

        $validated = $validator->validated();

        $update = [
            "first_name"    => isset($validated["first_name"])     ? $validated["first_name"] : null,
            "last_name"     => isset($validated["last_name"])      ? $validated["last_name"] : null,
            "phone"         => isset($validated["phone"])          ? $validated["phone"] : null,
            "email"         => isset($validated["email"])          ? $validated["email"] : null,
            "address"       => isset($validated["address"])        ? $validated["address"] : null,
            "dob"           => isset($validated["dob"])            ? $validated["dob"] : null,
            "gender"        => isset($validated["gender"])         ? $validated["gender"] : null,
        ];

        if ($request->hasfile('resume')) {

            $resume  =  $request->file('resume');
            $update["resume"] = $resume->store('resume');    
        }

        if ($request->hasfile('applicant_photo')) {

            $resume  =  $request->file('applicant_photo');
            $update["applicant_photo"] = $resume->store('photo');    
        }

        $update["updated_by"] = 1;
        $update["updated_at"] = now();

        $applicant = Applicant::where('id', $id)->first();

        if($applicant){
          $applicant->update($update);
        } else{
            return response()->json(['error'=>'Applicant not exist']);
        }

        return response()->json(['success'=>'Applicant Update Success!']);

    }

    public function applicant(){
        return view('applicantList');
    }

    
    public function applicantList(Request $request){
        try {  
            
            if ($request->ajax()) {
                $data = Applicant::all();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $actionBtn = '<a href="javascript:void(0)" id="'.$row->id.'" class="view btn btn-success btn-sm">view</a> 
                        <a href="/applicant/edit/'.$row->id.'" class="btn btn-danger btn-sm">Edit</a>
                        <a href="javascript:void(0)" id="'.$row->id.'" class="delete btn btn-danger btn-sm">Delete</a>';
                        return $actionBtn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
          
        } catch(Exception $err){
            return $e->getMessage();
        }
        
    }

    public function applicantDetail($id){
     
        try {

            $applicant = Applicant::where('id', $id)->first();
            return response()->json($applicant);

        } catch(Exception $err){
            return $e->getMessage();
        }

    }

    public function applicantEdit($id){
     
        try {
            $applicant = Applicant::where('id', $id)->first();
            return view('applicantEdit', compact('applicant'));

        } catch(Exception $err){
            return $e->getMessage();
        }

    }

    public function deleteApplicant($id){
     
        try{

            $applicant = Applicant::findOrFail($id);
            $applicant->delete();

        } catch(Exception $err){
            return $e->getMessage();
        }

    }
}
