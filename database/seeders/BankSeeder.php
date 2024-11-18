<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ref_bank')->insert([
            ['id' => 1, 'nama_bank' => 'BANK BJB'],
            ['id' => 2, 'nama_bank' => 'BANK BRI'],
            ['id' => 3, 'nama_bank' => 'BANK MANDIRI'],
            ['id' => 4, 'nama_bank' => 'BANK BNI'],
            ['id' => 5, 'nama_bank' => 'BANK BSI'],
            ['id' => 6, 'nama_bank' => 'BANK BCA'],
            ['id' => 7, 'nama_bank' => 'BANK CIMB NIAGA'],
            ['id' => 8, 'nama_bank' => 'BANK DANAMON'],
            ['id' => 9, 'nama_bank' => 'BANK MEGA'],
            ['id' => 10, 'nama_bank' => 'BANK OCBC NISP'],
        ]);
    }
}
