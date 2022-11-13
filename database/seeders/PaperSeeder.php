<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Paper;
use App\Models\User;

class PaperSeeder extends Seeder
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
            DB::table('papers')->insert([
                'title' => Str::random(20),
                'content' => Str::random(50),
                'paper_status' => "Pending",
            ]);

            DB::table('submissions')->insert([
                'paper_pid' => Paper::inRandomOrder()->first()->pid,
                'user_id' => User::inRandomOrder()->first()->id,
            ]);
        }
    }
}
