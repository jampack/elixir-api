<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function columns(): HasMany
    {
        return $this->hasMany(BoardColumn::class, 'board_id', 'id');
    }

    public function cards(): HasMany
    {
        return $this->hasMany(Card::class, 'board_id', 'id');
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
    public function scopeMasterBoard($query)
    {
        return $query->where('master_board', true);
    }
}
