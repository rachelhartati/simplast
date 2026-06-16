<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentRequest extends Model
{
    use HasFactory;

    protected $table = 'agent_request';

    protected $fillable = [
        'agent_id',
        'tanggal_request',
        'item_id',
        'jumlah_barang',
        'status',
        'approved_at',
        'approved_by',
        'rejected_at',
        'rejected_by',
        'rejected_reason',
        'received_at',
        'foto_pemberian',
        'total',
    ];

   
    const STATUS_WAITING = 'waiting';
    const STATUS_APPROVED = 'approved';
    const STATUS_REJECTED = 'rejected';
    const STATUS_RECEIVED = 'received';

    
    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    
    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    
    public function rejector()
    {
        return $this->belongsTo(User::class, 'rejected_by');
    }


    public function isWaiting()
    {
        return $this->status === self::STATUS_WAITING;
    }

    public function isApproved()
    {
        return $this->status === self::STATUS_APPROVED;
    }

    public function isRejected()
    {
        return $this->status === self::STATUS_REJECTED;
    }

    public function isReceived()
    {
        return $this->status === self::STATUS_RECEIVED;
    }

    public function item()
{
    return $this->belongsTo(Item::class, 'item_id');
}
}