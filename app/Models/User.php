<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles; // ← tambahkan HasRoles

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    protected $guard_name = 'web';
    protected $table = 'user';

    protected $fillable = [
        'nama_lengkap',
        'no_tlp',
        'alamat',
        'password',   // ← tambahkan
        'agent_id',   // ← tambahkan
        'status',     // ← tambahkan
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agent_id');
    }

    public function role(){
    return $this->belongsTo(Role::class);
}
}