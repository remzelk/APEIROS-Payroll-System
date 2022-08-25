<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    public function run()
    {
        $user = [
            [
                'name'=>'Admin',
                'email'=>'admin@apeiros.com',
                'position'=>'Admin',
                'password'=>bcrypt('admin'),
            ],
            [
                'name'=>'Human Resources',
                'email'=>'humanresources@apeiros.com',
                'position'=>'Human Resources',
                'password'=>bcrypt('humanresources'),
            ],
            [
                'name'=>'Accounting',
                'email'=>'accounting@apeiros.com',
                'position'=>'Accounting',
                'password'=>bcrypt('accounting'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
