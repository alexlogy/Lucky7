<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
                'title' => Str::random(8),
                'content' => Str::random(10),
                'paper_status' => "Pending",
            ]);
        }
    }
}
