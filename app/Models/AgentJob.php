<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentJob extends Model
{
    use HasFactory;

    protected $table = 'agent_job';

    protected $fillable = [
        'agent_id',
        'user_id',
        'tanggal_diberikan',
        'item_id',
        'jumlah',
    ];

    /*
    |--------------------------------
    | STATUS CONSTANT (opsional tapi bagus)
    |--------------------------------
    */
    const STATUS_IN_PROGRESS = 'in_progress';
    const STATUS_DONE = 'done';

    /*
    |--------------------------------
    | RELATIONSHIP
    |--------------------------------
    */

    // job milik agent
    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    // job diberikan ke user (member)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function item() {
    return $this->belongsTo(Item::class, 'item_id'); 
}
    
}