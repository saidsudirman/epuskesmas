<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $filleble = [
        'judul',
        'isi',
        'gambar',
        'penulis',
        'tanggal_terbit',
    ];

    protected $dates = ['tanggal_terbit'];
}
