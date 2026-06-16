<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentStok extends Model
{
    use HasFactory;

    protected $table = 'agent_stok'; // ← tambahkan ini

    protected $fillable = [
        'agent_id',
        'item_id',       // ← ganti nama_barang
        'jumlah_barang',
    ];

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class); // ← tambahkan ini
    }
}