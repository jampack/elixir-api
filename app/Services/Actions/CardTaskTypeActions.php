<?php


namespace App\Services\Actions;


use App\Models\Board;

class CardTaskTypeActions
{
    public function createDefaultTaskTypes(Board $board)
    {
        $types = [
            ["name" => "Task", 'description' => 'Its a task'],
            ["name" => "Feature", 'description' => 'Its a new feature'],
            ["name" => "Bug", 'description' => 'Its a bug in the app'],
            ["name" => "Enhancement", 'description' => 'Its an enhancement'],
        ];

        $board->cardTaskType()->createMany($types);
    }

}
