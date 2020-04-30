<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Board extends Model
{
    protected $table = "boards";
    protected $primaryKey = "id";
    public $timestamps = "true";

    /**
     * Setup
     */
    protected $fillable = [
        "name",
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];

    /**
     * Relationships
     */
    public function project() : BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }

    /**
     * Accessors
     */


    /**
     * Mutators
     */
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = strtolower($value);
    }
}
