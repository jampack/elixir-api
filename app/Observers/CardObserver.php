<?php

namespace App\Observers;

use App\Models\Card;

class CardObserver
{
    public function creating(Card $card)
    {
        if($card->type !== 1){        // i.e type !== task
            $card->task_type_id = null;
        }
    }

    public function created(Card $card)
    {
        //
    }

    public function updated(Card $card)
    {
        //
    }

    public function deleted(Card $card)
    {
        //
    }

    public function restored(Card $card)
    {
        //
    }

    public function forceDeleted(Card $card)
    {
        //
    }
}
