<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storan extends Model
{
    use HasFactory;

    protected $table = 'storan';

    protected $fillable = [
        'agent_id',
        'req_id',
        'item_id',
        'jumlah_pcs',
        'user_id',
        'tanggal_setoran',
        'harga_per_pcs',
        'total',
    ];

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function agentRequest()
    {
        return $this->belongsTo(AgentRequest::class, 'req_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function storan()
    {
        return $this->belongsTo(Gaji::class, 'storan_id');
    }

    public function storanAnggota()
    {
        return $this->belongsTo(StoranAnggota::class, 'storan_anggota_id');
    }
}