<?php

namespace App\Policies;

use App\Sentence;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SentencePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the sentence.
     *
     * @param  \App\User  $user
     * @param  \App\Sentence  $sentence
     * @return mixed
     */
    public function update(User $user, Sentence $sentence)
    {
        if($sentence->page->user == null)
            return false;
        
        return $sentence->page->user->is($user);
    }

}
