<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Bob Admin',
                'email' => 'admin@email.com',
                'password' => Hash::make('senha1234'),
                'role' => 'admin'
            ],
            [
                'name' => 'Alice Normal',
                'email' => 'normal@email.com',
                'password' => Hash::make('senha1234'),
                'role' => 'normal_user'
            ],
            [
                'name' => 'Alex Visitor',
                'email' => 'visitor@email.com',
                'password' => Hash::make('senha1234'),
                'role' => 'visitor'
            ],
        ];

        DB::table('users')->insert($users);
    }
}
