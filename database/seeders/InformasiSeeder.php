<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Informasi;
use App\Models\Pelayanan;

class InformasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Coba ambil id pelayanan yang sudah ada
        $pelayanan = Pelayanan::first();

        if (!$pelayanan) {
            // Jika belum ada data pelayanan, kita buat dummy satu dulu
            $pelayanan = Pelayanan::create([
                'nama_layanan' => 'Poli Umum',
                'waktu_layanan' => 'Senin-Jumat: 07:30 - 14:00 WIB',
                'deskripsi' => 'Pelayanan dasar untuk keluhan umum pasien.'
            ]);
        }
        Informasi::create([
            'pelayanan_id' => $pelayanan->id,
            'jam_operasional' => 'Senin-Jumat: 07:30 - 16:00 WIB',
            'visi' => 'Menjadi puskesmas terdepan dalam pelayanan kesehatan masyarakat yang berkualitas',
            'misi' => '1. Memberikan pelayanan kesehatan yang bermutu
            2. Meningkatkan promosi kesehatan
            3. Menggerakkan masyarakat untuk hidup sehat',
                        'layanan' => '1. Poli Umum
            2. Poli Gigi
            3. KIA/KB
            4. Imunisasi
            5. Laboratorium Sederhana',
            'pengumuman' => 'Pelayanan Vaksinasi Booster tersedia setiap hari kerja'
        ]);

        // Tambahkan data lain jika diperlukan
        Informasi::create([
            'pelayanan_id' => $pelayanan->id,
            'jam_operasional' => 'Sabtu: 08:00 - 12:00 WIB',
            'visi' => null,
            'misi' => null,
            'layanan' => 'Hanya melayani kasus darurat pada hari Sabtu',
            'pengumuman' => 'Libur pada hari Minggu dan hari besar nasional'
        ]);
    }
}