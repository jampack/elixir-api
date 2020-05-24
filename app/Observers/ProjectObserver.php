<?php

namespace App\Observers;

use App\Models\Project;
use App\Services\Actions\BoardActions;
use App\Services\Actions\BoardColumnActions;
use App\Services\Actions\CardTaskTypeActions;
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
        $board = $boardAction->createMasterBoard($project);

        $boardColumnsAction = new BoardColumnActions();
        $boardColumnsAction->createDefaultColumns($board);

        $cardTaskTypesAction = new CardTaskTypeActions();
        $cardTaskTypesAction->createDefaultTaskTypes($board);
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
