<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id'=>1,
                'title'=>'Superior Administrator'
            ],
            [
                'id'=>2,
                'title'=>'Administrator'
            ],
            [
                'id'=>3,
                'title'=>'Employer'
            ],
            [
                'id'=>4,
                'title'=>'Jobseeker'
            ],
        ];

        Role::insert($roles);
    }
}
