<?php

namespace App\Policies;

use App\Models\Meme;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MemePolicy
{
    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Meme $meme)
    {
        return $user->id === $meme->user_id;
    }
}
