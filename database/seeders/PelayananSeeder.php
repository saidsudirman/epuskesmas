<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pelayanan;
use Illuminate\Support\Facades\DB;

class PelayananSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Pelayanan::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $data = [
            [
                'nama_layanan' => 'UNIT GAWAT DARURAT',
                'waktu_layanan' => '24 JAM',
                'deskripsi' => 'Layanan gawat darurat tersedia 24 jam untuk penanganan kasus emergency'
            ],
            [
                'nama_layanan' => 'LAYANAN RAWAT INAP',
                'waktu_layanan' => '24 JAM',
                'deskripsi' => 'Layanan rawat inap tersedia 24 jam dengan fasilitas lengkap'
            ],
            [
                'nama_layanan' => 'LAYANAN RUJUKAN GAWAT DARURAT',
                'waktu_layanan' => '24 JAM',
                'deskripsi' => 'Layanan rujukan gawat darurat ke rumah sakit rujukan'
            ],
            [
                'nama_layanan' => 'LAYANAN FARMASI UNTUK UGD DAN RAWAT INAP',
                'waktu_layanan' => '24 JAM',
                'deskripsi' => 'Penyediaan obat untuk pasien UGD dan rawat inap'
            ]
        ];

        foreach ($data as $layanan) {
            Pelayanan::create($layanan);
        }
    }
}