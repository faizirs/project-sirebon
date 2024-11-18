<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
    \App\Models\User::query()->delete();

    User::create([
        'name' => 'Admin Aplikasi',
        'username' => 'admin_',
        'level' => 'admin',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('admin123'),
        'id_user_group' => 1,
        'remember_token' => Str::random(60),
    ]);
    
    User::create([
        'name' => 'Wajib Retribusi',
        'username' => 'retribusi_1',
        'level' => 'retribusi',
        'email' => 'user@gmail.com',
        'password' => bcrypt('user123'),
        'id_user_group' => 2,
        'remember_token' => Str::random(60),
    ]);
    User::create([
        'name' => 'Wajib Retribusi',
        'username' => 'retribusi_2',
        'level' => 'retribusi',
        'email' => 'user2@gmail.com',
        'password' => bcrypt('user123'),
        'id_user_group' => 2,
        'remember_token' => Str::random(60),
    ]);
}

}
