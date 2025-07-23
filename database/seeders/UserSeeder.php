<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Dr. Ahmad Santoso, Sp.PD',
            'email' => 'dokter@gmail.com',
            'password' => bcrypt('123'),
            'role' => 'dokter'
        ]);

        User::create([
            'name' => 'Dr. Cantika, Sp.OG',
            'email' => 'dokter2@gmail.com',
            'password' => bcrypt('123'),
            'role' => 'dokter'
        ]);
    }
}
