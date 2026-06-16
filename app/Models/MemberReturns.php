<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberReturn extends Model
{
    use HasFactory;

    protected $table = 'member_returns';

    const AGENT_FEE_PERCENT = 1; // ← 1% untuk agent

    protected $fillable = [
        'agent_job_id',
        'user_id',
        'item_id',
        'jumlah_pcs',
        'tanggal_return',
    ];

    /*
    |--------------------------------
    | RELATIONSHIP
    |--------------------------------
    */

    public function agentJob()
    {
        return $this->belongsTo(AgentJob::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    /*
    |--------------------------------
    | ACCESSOR (AUTO HITUNG GAJI)
    |--------------------------------
    */

    // Total sebelum potongan
    public function getTotalKotorAttribute()
    {
        return $this->jumlah_pcs * ($this->item->harga_item ?? 0);
    }

    // Potongan 1% untuk agent
    public function getAgentFeeAttribute()
    {
        return $this->total_kotor * (self::AGENT_FEE_PERCENT / 100);
    }

    // Total yang diterima anggota
    public function getTotalBersihAttribute()
    {
        return $this->total_kotor - $this->agent_fee;
    }
}