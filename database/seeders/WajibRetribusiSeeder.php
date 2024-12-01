<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WajibRetribusiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('wajib_retribusi')->insert([
            [
                'id' => 1,
                'id_user' => 3,
                'nama' => 'FAizi Rahman Syawli',
                'no_hp' => '081234567890',
                'nik' => '3201010101010101',
                'alamat' => 'Jalan Ledeng No. 123',
                'id_kelurahan' => 5,
                'status' => 'A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'id_user' => 4,
                'nama' => 'Fauzi Alfarisi',
                'no_hp' => '089876543210',
                'nik' => '3202020202020202',
                'alamat' => 'Jalan Gunjat No. 456',
                'id_kelurahan' => 10,
                'status' => 'B',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
