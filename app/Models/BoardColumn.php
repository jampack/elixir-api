<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BoardColumn extends Model
{
    protected $table = "board_columns";
    protected $primaryKey = "id";
    public $timestamps = "true";

    /**
     * Setup
     */
    protected $fillable = [
        "name", "is_primary", "order"
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];

    /**
     * Relationships
     */
    public function board() : BelongsTo {
        return $this->belongsTo(Board::class, 'board_id', 'id');
    }

    public function cards() : HasMany {
        return $this->hasMany(Card::class, 'board_column_id', 'id');
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
