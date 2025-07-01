<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artikel;

class ArtikelSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk tabel artikel.
     */
    public function run(): void
    {
        Artikel::create([
            'judul'   => 'Pentingnya Pola Hidup Sehat',
            'isi'     => 'Menjaga pola hidup sehat sangat penting untuk meningkatkan kualitas hidup dan mencegah berbagai macam penyakit.',
            'gambar'  => 'upload/artikel/artikel1.jpg', // sesuaikan atau kosongkan jika tidak ada
            'penulis' => 'Puskesmas Kalosi',
        ]);

        Artikel::create([
            'judul'   => 'Vaksinasi Anak Sejak Dini',
            'isi'     => 'Vaksinasi membantu membentuk kekebalan tubuh anak terhadap berbagai penyakit berbahaya.',
            'gambar'  => 'upload/artikel/artikel2.jpg',
            'penulis' => 'Puskesmas Kalosi',
        ]);

        Artikel::create([
            'judul'   => 'Tips Mengelola Stres di Kehidupan Sehari-hari',
            'isi'     => 'Stres bisa berdampak negatif terhadap kesehatan. Penting untuk mengetahui cara mengelolanya dengan baik.',
            'gambar'  => 'upload/artikel/artikel3.jpg',
            'penulis' => 'Puskesmas Kalosi',
        ]);
    }
}
