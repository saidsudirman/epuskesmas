<?php

namespace Database\Seeders;

use App\Models\Users1;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class Users1Seeder extends Seeder
{
    /**
     * Jalankan seeder.
     */
    public function run(): void
    {
        $users1 = [
            [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make('123')
            ],
            [
                'name' => 'user Dua',
                'email' => 'user2@gmail.com',
                'password' => Hash::make('123456')
            ]
        ];

        Users1::insert($users1);
    }
}
