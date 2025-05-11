<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(UserSeeder::class);
        $this->call(KaryawanSeeder::class);
        $this->call(KontrakKerjaSeeder::class);
        $this->call(LogKontrakKerjaSeeder::class);
        $this->call(ResignasiSeeder::class);
        $this->call(LogResignasiSeeder::class);
        $this->call(PelatihanSeeder::class);
    }
}
