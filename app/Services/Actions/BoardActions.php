<?php

namespace App\Services\Actions;
use App\Models\Board;
use App\Models\Project;

class BoardActions
{
    public function createBoard(Project $project)
    {
        $board = new Board();

        $board->name = "Master Board";
        $board->master_board = true;

        $project->boards()->save($board);
    }

}
