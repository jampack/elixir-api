<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BoardColumn extends Model
{
    protected $table = "board_columns";
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
    public function board() : BelongsTo
    {
        return $this->belongsTo(Board::class, 'board_id', 'id');
    }

    /**
     * Accessors
     */


    /**
     * Mutators
     */
}
