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
            ['id' => 1, 'nama_kelurahan' => 'Argasunya'],
            ['id' => 2, 'nama_kelurahan' => 'Drajat'],
            ['id' => 3, 'nama_kelurahan' => 'Harjamukti'],
            ['id' => 4, 'nama_kelurahan' => 'Jagasatru'],
            ['id' => 5, 'nama_kelurahan' => 'Kalijaga'],
            ['id' => 6, 'nama_kelurahan' => 'Karyamulya'],
            ['id' => 7, 'nama_kelurahan' => 'Kasepuhan'],
            ['id' => 8, 'nama_kelurahan' => 'Kebonbaru'],
            ['id' => 9, 'nama_kelurahan' => 'Kecapi'],
            ['id' => 10, 'nama_kelurahan' => 'Kejaksan'],
            ['id' => 11, 'nama_kelurahan' => 'Kesambi'],
            ['id' => 12, 'nama_kelurahan' => 'Kesenden'],
            ['id' => 13, 'nama_kelurahan' => 'Larangan'],
            ['id' => 14, 'nama_kelurahan' => 'Lemahwungkuk'],
            ['id' => 15, 'nama_kelurahan' => 'Panjunan'],
            ['id' => 16, 'nama_kelurahan' => 'Pegambiran'],
            ['id' => 17, 'nama_kelurahan' => 'Pekalangan'],
            ['id' => 18, 'nama_kelurahan' => 'Pekalipan'],
            ['id' => 19, 'nama_kelurahan' => 'Pekiringan'],
            ['id' => 20, 'nama_kelurahan' => 'Pulasaren'],
            ['id' => 21, 'nama_kelurahan' => 'Sunyaragi'],
            ['id' => 22, 'nama_kelurahan' => 'Sukapura'],
        ]);
    }
}
