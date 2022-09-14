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
                'name'=>'Apeiros',
                'email'=>'apeiros@apeiros.com',
                'position'=>'1',
                'password'=>bcrypt('admin'),
            ],
            [
                'name'=>'Human Resources',
                'email'=>'humanresources@apeiros.com',
                'position'=>'2',
                'password'=>bcrypt('humanresources'),
            ],
            [
                'name'=>'Accounting',
                'email'=>'accounting@apeiros.com',
                'position'=>'3',
                'password'=>bcrypt('accounting'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
