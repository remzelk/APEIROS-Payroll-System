<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;

class CreateUsersSeeder extends Seeder
{
    public function run()
    {
        $user = [
            [
                'name'=>'Admin',
                'email'=>'admin@apeiros.com',
                'position'=>'1',
                'userno'=>'22100601',
                'password'=>bcrypt('admin123'),
            ]
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
