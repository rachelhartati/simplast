<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoranAnggota extends Model
{
    use HasFactory;

    protected $table = 'storan_anggota';

    protected $fillable = [
        'agent_id',
        'job_id',
        'user_id',
        'item_id',
        'jumlah_pcs',
        'harga_per_pcs',
        'total',
        'tanggal',
    ];

    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

    public function agentJob()
    {
        return $this->belongsTo(AgentJob::class, 'job_id');
    }
}
