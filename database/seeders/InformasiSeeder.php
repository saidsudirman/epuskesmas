<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Informasi;

class InformasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Informasi::create([
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
            'jam_operasional' => 'Sabtu: 08:00 - 12:00 WIB',
            'visi' => null,
            'misi' => null,
            'layanan' => 'Hanya melayani kasus darurat pada hari Sabtu',
            'pengumuman' => 'Libur pada hari Minggu dan hari besar nasional'
        ]);
    }
}