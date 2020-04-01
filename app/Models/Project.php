<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    protected $table = "projects";
    protected $primaryKey = "id";
    public $timestamps = "true";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * Relationships
     */
    public function users() : BelongsToMany
    {
        return $this->belongsToMany(User::class, 'project_users', 'project_id','user_id');
    }
}
