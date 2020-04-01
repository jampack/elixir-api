<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    protected $table = "teams";
    protected $primaryKey = "id";
    public $timestamps = "true";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * Relationships
     */
    public function users() : BelongsToMany {
        return $this->belongsToMany(User::class,'team_users', 'team_id', 'user_id');
    }
}
