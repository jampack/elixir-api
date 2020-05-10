<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProjectStatus extends Model
{
    protected $table = "project_statuses";
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
    public function projects(): HasMany{
        return $this->hasMany(Project::class, 'status_id', 'id');
    }

    /**
     * Accessors
     */
    public function getNameAttribute($value){
        return ucfirst($value);
    }

    /**
     * Mutators
     */

    /**
     * Scopes
     */
}
