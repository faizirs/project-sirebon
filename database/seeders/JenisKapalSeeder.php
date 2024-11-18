<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisKapalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ref_jenis_kapal')->insert([
            ['id' => 1, 'jenis_kapal' => 'Kapal Nelayan', 'biaya_retribusi' => '30000'],
            ['id' => 2, 'jenis_kapal' => 'Kapal Feri', 'biaya_retribusi' => '90000'],
            ['id' => 3, 'jenis_kapal' => 'Kapal Tongkang', 'biaya_retribusi' => '100000'],
            ['id' => 4, 'jenis_kapal' => 'Kapal Kargo', 'biaya_retribusi' => '150000'],
            ['id' => 5, 'jenis_kapal' => 'Kapal Pesiar', 'biaya_retribusi' => '200000'],
            ['id' => 6, 'jenis_kapal' => 'Kapal Penumpang', 'biaya_retribusi' => '120000'],
            ['id' => 7, 'jenis_kapal' => 'Kapal Cepat', 'biaya_retribusi' => '70000'],
            ['id' => 8, 'jenis_kapal' => 'Kapal Layar', 'biaya_retribusi' => '50000'],
        ]);
    }
}
