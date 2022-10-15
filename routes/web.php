<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicantController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ApplicantController::class, 'index']);
Route::post('applicant/create', [ApplicantController::class, 'applicantCreate'])->name('applicant.create');
Route::post('applicant/update/{id}', [ApplicantController::class, 'applicantUpdate']);
Route::get('applicant', [ApplicantController::class, 'applicant'])->name('applicant');
Route::get('applicant/list', [ApplicantController::class, 'applicantList'])->name('applicant.list');
Route::delete('applicant/delete/{id}', [ApplicantController::class, 'deleteApplicant']);
Route::get('applicant/detail/{id}', [ApplicantController::class, 'applicantDetail']);
Route::get('applicant/edit/{id}', [ApplicantController::class, 'applicantEdit'])->name('applicant.edit');
