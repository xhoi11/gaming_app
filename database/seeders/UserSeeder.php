<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
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
                'first_name' => 'Goku',
                'last_name' => Str::random(10),
                'birthday' => date::parse(),
                'email' => 'goku@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'first_name' => Str::random(10),
                'last_name' => Str::random(10),
                'birthday' => date::parse(),
                'email' => Str::random(10) . '@yahoo.com',
                'password' => Hash::make('password'),
            ],
            [
                'first_name' => Str::random(10),
                'last_name' => Str::random(10),
                'birthday' => date::parse(),
                'email' => Str::random(10) . '@outlook.com',
                'password' => Hash::make('password'),
            ],
            [
                'first_name' => Str::random(10),
                'last_name' => Str::random(10),
                'birthday' => date::parse(),
                'email' => Str::random(10) . '@hotmail.com',
                'password' => Hash::make('password'),
            ]
        ]);
    }
}
