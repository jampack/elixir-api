<?php

namespace App\Services\Actions;

use App\Models\Board;

class BoardColumnActions
{
    public function createDefaultColumns(Board $board)
    {
        $columns = [
            ["name" => "To Do", "is_primary" => true, 'order' => 1],
            ["name" => "In Progress", 'order' => 2],
            ["name" => "Done", 'order' => 3],
        ];

        $board->columns()->createMany($columns);
    }
}
