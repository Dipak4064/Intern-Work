<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Factorie;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([EmployeSeeder::class]);
        // Factorie::factory()->count(5)->create();
        Factorie::factory(5)->create();
    }
}
;
