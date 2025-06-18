<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelayanan extends Model
{
    use HasFactory;
    protected $table = 'pelayanan';
    protected $fillable = ['
        nama_layanan',
        'waktu_layanan',
        'deskripsi'
    ];

    public function informasis(): HasMany
    {
        return $this->hasMany(Informasi::class);
    }
}
