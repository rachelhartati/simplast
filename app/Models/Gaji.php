<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;

    protected $table = 'gaji';
    
    protected $fillable = [
        'agent_id', 
        'user_id', 
        'total',
        'storan_id',
        'storan_anggota_id'
    ];
}
