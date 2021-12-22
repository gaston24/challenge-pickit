<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        DB::statement("SET foreign_key_checks=0");
        $this->call([
            CarsSeeder::class,
        ]);

        DB::statement("SET foreign_key_checks=1");
    }
}
