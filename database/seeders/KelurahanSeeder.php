<?php

namespace Database\Seeders;

use App\Models\Kelurahan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelurahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kelurahan')->insert([
            ['id' => 1, 'nama_kelurahan' => 'Kalijaga'],
            ['id' => 2, 'nama_kelurahan' => 'Kesambi'],
            ['id' => 3, 'nama_kelurahan' => 'Kejaksan'],
            ['id' => 4, 'nama_kelurahan' => 'Lemahwungkuk'],
            ['id' => 5, 'nama_kelurahan' => 'Argasunya'],
            ['id' => 6, 'nama_kelurahan' => 'Kecapi'],
            ['id' => 7, 'nama_kelurahan' => 'Larangan'],
        ]);
    }
}
