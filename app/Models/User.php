<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = "users";
    protected $primaryKey = "id";
    public $timestamps = "true";

    /**
     * Setup
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'status'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relationships
     */
    public function teams() : BelongsToMany {
        return $this->belongsToMany(Team::class, 'team_users','user_id', 'team_id');
    }

    public function setting() : HasOne {
        return $this->hasOne(UserSetting::class, 'user_id','id');
    }

    public function projects() : BelongsToMany
    {
        return $this->belongsToMany(User::class, 'project_users', 'user_id','project_id');
    }
}
