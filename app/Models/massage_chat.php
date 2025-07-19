<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class massage_chat extends Model
{
    use HasFactory;

    protected $fillable = [
        "dokter_id",
        "sender",
        "message",
    ];
     public function dokter()
    {
        return $this->belongsTo(dokter::class, 'dokter_id', 'id');
    }







    


}
