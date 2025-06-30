<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pelayanan; // pastikan ini ditambahkan
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Informasi extends Model
{
    use HasFactory;

    protected $table = 'informasi';

    protected $fillable = [
        'pelayanan_id',
        'jam_operasional',
        'visi',
        'misi',
        'layanan',
        'pengumuman'
    ];

    /**
     * Relasi ke model Pelayanan
     */
    public function pelayanan(): BelongsTo
    {
        return $this->belongsTo(Pelayanan::class);
    }
}
