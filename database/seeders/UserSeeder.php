<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'username' => 'adminuser',
                'phone' => '1234567890',
                'email' => 'admin@test.com',
                'role' => 'admin',
                'status' => 'active',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Vendor User',
                'username' => 'vendoruser',
                'phone' => '1234567891',
                'email' => 'vendor@test.com',
                'role' => 'vendor',
                'status' => 'active',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'First User',
                'username' => 'firstuser  ',
                'phone' => '1234567890',
                'email' => 'first@user.com',
                'role' => 'user',
                'status' => 'active',
                'password' => bcrypt('password')
            ],
            
        ]);
    }
}
