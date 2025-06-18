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
            ],
            [
                'nama_layanan' => 'LAYANAN LABORATORIUM UNTUK UGD DAN RAWAT INAP',
                'waktu_layanan' => '24 JAM',
                'deskripsi' => 'Pemeriksaan laboratorium untuk pasien UGD dan rawat inap'
            ],
            [
                'nama_layanan' => 'LAYANAN BERSALIN/NIFAS',
                'waktu_layanan' => '24 JAM',
                'deskripsi' => 'Layanan persalinan dan perawatan nifas'
            ],
            [
                'nama_layanan' => 'LAYANAN AMBULANCE RUJUKAN',
                'waktu_layanan' => '24 JAM',
                'deskripsi' => 'Layanan ambulance untuk rujukan pasien'
            ],
            [
                'nama_layanan' => 'LAYANAN PENDAFTARAN',
                'waktu_layanan' => "SENIN-KAMIS: 08.00-11.30 WITA\nJUM'AT: 08.00-11.00 WITA\nSABTU: 08.00-11.00 WITA",
                'deskripsi' => 'Pendaftaran pasien baru dan lama'
            ],
            [
                'nama_layanan' => 'LAYANAN PEMERIKSAAN UMUM',
                'waktu_layanan' => 'SENIN-SABTU: 08.00-SELESAI',
                'deskripsi' => 'Pemeriksaan umum oleh dokter'
            ],
            [
                'nama_layanan' => 'LAYANAN PENDERITA HIPERTENSI DAN DM',
                'waktu_layanan' => 'SABTU: 08.00-SELESAI',
                'deskripsi' => 'Layanan khusus untuk penderita hipertensi dan diabetes melitus'
            ],
            [
                'nama_layanan' => 'LAYANAN TB PARU',
                'waktu_layanan' => 'RABU: 08.00-SELESAI',
                'deskripsi' => 'Layanan khusus untuk penderita tuberkulosis paru'
            ],
            [
                'nama_layanan' => 'LAYANAN KIA/KB',
                'waktu_layanan' => 'SENIN-SABTU: 08.00-SELESAI',
                'deskripsi' => 'Layanan kesehatan ibu dan anak serta keluarga berencana'
            ],
            [
                'nama_layanan' => 'LAYANAN FARMASI/OBAT',
                'waktu_layanan' => 'SENIN-SABTU: 08.00-SELESAI',
                'deskripsi' => 'Penyediaan obat untuk pasien rawat jalan'
            ],
            [
                'nama_layanan' => 'LAYANAN KESEHATAN GIGI DAN MULUT',
                'waktu_layanan' => 'SENIN-SABTU: 08.00-SELESAI',
                'deskripsi' => 'Layanan kesehatan gigi dan mulut'
            ],
            [
                'nama_layanan' => 'LAYANAN KONSELING TERPADU',
                'waktu_layanan' => 'SENIN-SABTU: 08.00-SELESAI',
                'deskripsi' => 'Layanan konseling kesehatan terpadu'
            ],
            [
                'nama_layanan' => 'LAYANAN MTBS',
                'waktu_layanan' => 'SENIN-SABTU: 08.00-SELESAI',
                'deskripsi' => 'Manajemen Terpadu Balita Sakit'
            ]
        ];

        foreach ($data as $layanan) {
            Pelayanan::create($layanan);
        }
    }
}