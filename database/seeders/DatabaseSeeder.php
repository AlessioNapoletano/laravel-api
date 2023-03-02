<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(TechnologiesSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(ProjectsTechnologiesSeeder::class);
    }
}
