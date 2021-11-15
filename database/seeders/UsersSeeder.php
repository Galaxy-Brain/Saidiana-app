<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super = new User();
        $super->name = 'Super Administrator';
        $super->email = 'admin@saidiana.com';
        $super->password = Hash::make('1234567890');
        $super->role_id= 1;


        $admin = new User();
        $admin->name = 'Administrator';
        $admin->email = 'admin2@saidiana.com';
        $admin->password = Hash::make('1234567890');
        $admin->role_id= 2;

        $employer = new User();
        $employer->name = 'Employer Test';
        $employer->email = 'employer@saidiana.com';
        $employer->password = Hash::make('1234567890');
        $employer->role_id= 3;

        $Jobseeker = new User();
        $Jobseeker->name = 'John Doe';
        $Jobseeker->email = 'j.doe@gmail.com';
        $Jobseeker->password = Hash::make('1234567890');
        $Jobseeker->role_id= 4;


        $super->save();
        $admin->save();
        $employer->save();
        $Jobseeker->save();
    }
}
