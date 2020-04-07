<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AttendanceScheme extends Model
{
    protected $table = "attendance_schemes";
    protected $primaryKey = "id";
    public $timestamps = "true";

    /**
     * Setup
     */
    protected $fillable = [];

    protected $hidden = [];

    protected $casts = [];

    /**
     * Relationships
     */

    public function users() : HasMany
    {
        return $this->hasMany(User::class,'attendance_scheme_id','id');
    }
}
