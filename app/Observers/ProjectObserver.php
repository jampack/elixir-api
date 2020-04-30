<?php

namespace App\Observers;

use App\Models\Project;
use App\Services\Actions\BoardActions;
use Illuminate\Support\Str;

class ProjectObserver
{
    public function creating(Project $project)
    {
        $project->slug = Str::slug($project->name);
    }

    public function created(Project $project)
    {
        $boardAction = new BoardActions();
        $boardAction->createBoard($project);
    }

    public function updating(Project $project)
    {
        $project->slug = Str::slug($project->name);
    }

    public function updated(Project $project)
    {
        //
    }

    public function deleted(Project $project)
    {
        //
    }

    public function restored(Project $project)
    {
        //
    }

    public function forceDeleted(Project $project)
    {
        //
    }
}
