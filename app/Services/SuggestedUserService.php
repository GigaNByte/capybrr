<?php

namespace App\Services;

use App\Models\User;



class SuggestedUserService
{

    public function getUser($user): ? User
    {

        if ($user->info->gender == 'Male') {
            return User::inRandomOrder()
                ->whereRelation('info', 'gender', 'Female')
                ->userWithoutReactionQuery($user->id)
                ->first();
        } elseif ($user->info->gender == 'Female') {
            return User::inRandomOrder()
                ->whereRelation('info', 'gender', 'Male')
                ->userWithoutReactionQuery($user->id)
                ->first();
        } else {
            return null;
        }
    }
}
