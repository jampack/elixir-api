<?php

namespace App\Services\Actions;

use App\Models\Board;

class BoardColumnActions
{
    public function createDefaultColumns(Board $board)
    {
        $columns = [
            ["name" => "To Do"],
            ["name" => "In Progress"],
            ["name" => "Done"],
        ];

        $board->columns()->createMany($columns);
    }
}
