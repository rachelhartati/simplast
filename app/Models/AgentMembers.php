<?php

namespace App\Models;

use App\Models\User;
use App\Models\Agent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentMembers extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id',
        'user_id',
    ];

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
