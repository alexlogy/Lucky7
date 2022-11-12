<?php

namespace Database\Seeders;

use App\Models\Paper;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seed 100 times
        for ($i = 0; $i <= 100; $i++) {
            DB::table('reviews')->insert([
                'paper_pid' => Paper::inRandomOrder()->first()->pid,
                'user_id' => User::inRandomOrder()->first()->id,
                'paper_rating' => rand(-3, 3),
                'review_status' => Str::random(30),
                'review_rating' => rand(-3, 3),
            ]);
        }
    }
}
