<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // call other seeders
        $this->call([
            UserSeeder::class,
            PaperSeeder::class,
            ReviewSeeder::class,
            BidSeeder::class,
            CommentSeeder::class,
        ]);
    }
}
