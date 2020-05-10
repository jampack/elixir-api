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
     * Setup
     */
    protected $fillable = [
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];

    /**
     * Relationships
     */
    public function users() : BelongsToMany {
        return $this->belongsToMany(User::class,'team_users', 'team_id', 'user_id');
    }

    /**
     * Accessors
     */

    /**
     * Mutators
     */

    /**
     * Scopes
     */
}
