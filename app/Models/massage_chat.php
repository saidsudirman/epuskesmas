<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class massage_chat extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "dokter_id",
        "sender",
        "message",
    ];
    

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function dokter()
    {
        return $this->belongsTo(dokter::class, 'dokter_id', 'id');
    }







    


}
