<?php

namespace Database\Seeders;

use App\Models\Dokter;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dokters = [
            [
                'nama' => 'Dr. Ahmad Santoso, Sp.PD',
                'nip' => '198003012003121001',
                'email' => 'ahmad.santoso@example.com',
                'whatsapp' => '6281242950883',
                'spesialis' => 'Penyakit Dalam',
                'jam_kerja' => 'Senin-Jumat, 08:00-15:00',
                'foto' => 'upload/dokter/team-2.jpg'
            ],
            [
                'nama' => 'Dr. Cantika, Sp.OG',
                'nip' => '197512102005011002',
                'email' => 'budi.setiawan@example.com',
                'whatsapp' => '6281242950883',
                'spesialis' => 'Kebidanan dan Kandungan',
                'jam_kerja' => 'Senin-Rabu, 10:00-17:00',
                'foto' => 'upload/dokter/team-3.jpg'
            ],
            [
                'nama' => 'Dr. Citra Dewi, Sp.A',
                'nip' => '198511152010122003',
                'email' => 'citra.dewi@example.com',
                'whatsapp' => '6281242950883',
                'spesialis' => 'Anak',
                'jam_kerja' => 'Selasa-Kamis, 09:00-16:00',
                'foto' => 'upload/dokter/team-1.jpg'
            ],
        ];

        foreach ($dokters as $dokter) {
            Dokter::create($dokter);
        }
    }
}