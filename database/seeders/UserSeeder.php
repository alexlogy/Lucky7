<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        $user_types = array("Author", "Reviewer", "Admin", "Conference Chair");   // initialize array

        // seed 100 times
        for ($i = 0; $i <= 100; $i++) {
            DB::table('users')->insert([
                'name' => Str::random(8),
                'email' => Str::random(10).'@email.com',
                'type' => $user_types[array_rand($user_types, 1)],
                'password' => Hash::make('password'),
            ]);
        }

    }
}
