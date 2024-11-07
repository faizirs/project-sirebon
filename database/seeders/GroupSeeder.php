<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('groups')->insert([
            ['id' => 1, 'nama_group' => 'Admin Group'],
            ['id' => 2, 'nama_group' => 'Retribusi Group'],
        ]);
    }
}

