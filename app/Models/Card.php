<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Card extends Model
{
    protected $table = "cards";
    protected $primaryKey = "id";
    public $timestamps = "true";

    /**
     * Setup
     */
    protected $fillable = [
        'title',
        'description',
        'type',
        'task_type_id',
        'board_id',
        'board_column_id',
        'owner_id'
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

    public function column(): BelongsTo {
        return $this->belongsTo(BoardColumn::class, 'board_column_id', 'id');
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function taskType() : BelongsTo {
        return $this->belongsTo(CardTaskType::class, 'task_type_id', 'id');
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
