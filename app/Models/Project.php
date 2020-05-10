<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Project extends Model
{
    protected $table = "projects";
    protected $primaryKey = "id";
    public $timestamps = "true";

    /**
     * Setup
     */
    protected $fillable = [
        "name",
        "owner_id",
        "description",
        "status_id"
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];

    /**
     * Relationships
     */
    public function users() : BelongsToMany {
        return $this->belongsToMany(User::class, 'project_users', 'project_id','user_id');
    }

    public function owner() : BelongsTo {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function status() : BelongsTo {
        return $this->belongsTo(ProjectStatus::class, 'status_id', 'id');
    }

    public function modules() : HasMany {
        return $this->hasMany(ProjectModule::class, 'project_id', 'id');
    }

    public function boards() : HasMany {
        return $this->hasMany( Board::class, 'project_id', 'id');
    }

    /**
     * Accessors
     */


    /**
     * Mutators
     */
    public function setSlugAttribute($value) {
        $this->attributes['slug'] = strtolower($value);
    }

    /**
     * Scopes
     */
}
