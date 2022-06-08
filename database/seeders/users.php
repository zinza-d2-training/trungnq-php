<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('11111111'),
                'role' => '1',
            ], [
                'name' => 'user_company,',
                'email' => 'ac_cp@gmail.com',
                'password' => Hash::make('11111111'),
                'role' => '2',
            ], [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make('11111111'),
                'role' => '3',
            ]
        ]);
    }
}
