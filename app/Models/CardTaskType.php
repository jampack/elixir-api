<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CardTaskType extends Model
{
    protected $table = "card_task_types";
    protected $primaryKey = "id";
    public $timestamps = "true";

    /**
     * Setup
     */
    protected $fillable = [
        'board_id',
        'name',
        'description',
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
        return $this->hasMany(Card::class, 'task_type_id', 'id');
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
