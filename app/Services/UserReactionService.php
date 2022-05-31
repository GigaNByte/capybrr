<?php

namespace App\Services;

use App\Models\Match;
use App\Models\User;



class UserReactionService
{

    public function likeUser($user,$suggestedUser)
    {

        if ($match = Match::where('user_one_id',$user)->where('user_two_id',$suggestedUser)->first()) {
            $match->update([
                'has_user_one_liked' => True
            ]);

        }
         else if ($match = Match::where('user_two_id',$user)->where('user_one_id',$suggestedUser)->first()){
             $match->Update([
                'has_user_two_liked' => True
            ]);

        }else{
             $match = Match::create([
                 'user_one_id' => $user,
                 'user_two_id' => $suggestedUser,
                 'has_user_one_liked'=> True
             ]);
         }

        if ($match->isMatch()){
            return true;
        }else{
            return false;
        }
    }


}
