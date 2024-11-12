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
            ['id' => 1, 'jenis_kapal' => 'Kapal Nelayan','biaya_retribusi'=>'30000'],
            ['id' => 2, 'jenis_kapal' => 'Kapal Feri','biaya_retribusi'=>'90000'],
            ['id' => 3, 'jenis_kapal' => 'Kapal Tongkang','biaya_retribusi'=>'100000'],
        ]);
    }
}
