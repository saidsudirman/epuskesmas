<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    use HasFactory;
    protected $table = 'informasi';
    protected $fillable = [
        'jam_operasional',
        'visi', 
        'misi',
        'layanan', 
        'pengumuman'
    ];

    public function pelayanan(): BelongsTo
    {
        return $this->belongsTo(Pelayanan::class);
    }
}