<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $table = 'agent';

    protected $fillable = [
        'nama_agent',
        'alamat_agent',
        'no_tlp_agent',
        'pic_id',
    ];  

    public function pic()
    {
        return $this->belongsTo(User::class, 'pic_id');
    }

    public function users(){
    return $this->hasMany(User::class, 'agent_id');
}
}
