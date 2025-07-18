<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users1 extends Authenticatable
{
    use HasFactory;

    protected $table = 'users1';

    protected $fillable = [
        'name', 'email', 'password',
    ];
}
