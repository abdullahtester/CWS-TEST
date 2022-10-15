<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Applicant;

class ApplicantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Applicant::create([
            'first_name'  => 'james',
            'last_name'   => 'martin',
            'phone'       => '1234567890',
            'email'       => 'james@gmail.com',
            'address'     => 'Delhi',
            'dob'         => '05/10/2003',
            'gender'      => 'male',
            'added_by'    => 1,
            'added_at'    => now()
        ]);

        Applicant::create([
            'first_name'  => 'Harry',
            'last_name'   => 'Peter',
            'phone'       => '1234567890',
            'email'       => 'harry@gmail.com',
            'address'     => 'Noida',
            'dob'         => '07/05/2000',
            'gender'      => 'male',
            'added_by'    => 1,
            'added_at'    => now()
        ]);

        Applicant::create([
            'first_name'  => 'Martin',
            'last_name'   => 'Jones',
            'phone'       => '1234567890',
            'email'       => 'martin@gmail.com',
            'address'     => 'Kolkata',
            'dob'         => '08/10/2002',
            'gender'      => 'female',
            'added_by'    => 1,
            'added_at'    => now()
        ]);

        Applicant::create([
            'first_name'  => 'Jack',
            'last_name'   => 'Bose',
            'phone'       => '1234567890',
            'email'       => 'jack@gmail.com',
            'address'     => 'Pune',
            'dob'         => '08/05/2001',
            'gender'      => 'male',
            'added_by'    => 1,
            'added_at'    => now()
        ]);

        Applicant::create([
            'first_name'  => 'Peter',
            'last_name'   => 'Den',
            'phone'       => '1234567890',
            'email'       => 'peter@gmail.com',
            'address'     => 'Noida',
            'dob'         => '08/05/2001',
            'gender'      => 'female',
            'added_by'    => 1,
            'added_at'    => now()
        ]);
        
    }
}
