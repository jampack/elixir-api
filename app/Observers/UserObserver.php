<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserObserver
{
    public function creating(User $user)
    {
        $password = Str::random('8');
        $user->password = Hash::make($password);
        $user->plain_password = $password;
    }

    public function created(User $user)
    {
        //
    }

    public function updated(User $user)
    {
        //
    }

    public function deleted(User $user)
    {
        //
    }

    public function restored(User $user)
    {
        //
    }

    public function forceDeleted(User $user)
    {
        //
    }
}
