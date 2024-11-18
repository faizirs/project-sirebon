<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\WajibRetribusi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(GroupSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(BankSeeder::class);
        $this->call(KelurahanSeeder::class);
        $this->call(JenisKapalSeeder::class);
        $this->call(WajibRetribusiSeeder::class);
    }
}
