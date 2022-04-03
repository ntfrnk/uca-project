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
        \App\Models\Student::factory(30)->create();
        \App\Models\Teacher::factory(10)->create();
        \App\Models\Course::factory(12)->create();
    }
}
