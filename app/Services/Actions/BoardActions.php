<?php

use App\Models\Board;
use App\Models\Project;

class BoardActions
{
    public function createBoard(Project $project)
    {
        $board = new Board();

        $board->name = "Master Board";
        $board->deletable = false;

        $project->board()->save($board);
    }

}
