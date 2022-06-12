<?php

namespace App\Services;

use App\Models\SingleMatch;
use App\Models\User;



class UserReactionService
{

    public function likeUser($user,$suggestedUser)
    {



        if ($match = SingleMatch::where('user_one_id',$user)->where('user_two_id',$suggestedUser)->first()) {
            $match->update([
                'has_user_one_liked' => true
            ]);

        }
         else if ($match = SingleMatch::where('user_two_id',$user)->where('user_one_id',$suggestedUser)->first()){
             $match->Update([
                'has_user_two_liked' => true
            ]);
        }else{
             $match = SingleMatch::create([
                 'user_one_id' => $user,
                 'user_two_id' => $suggestedUser,
                 'has_user_one_liked'=> true
             ]);
         }


        return $match->isMatch();


    }
    public function unlikeUser($user,$suggestedUser)
    {

        if ($match = SingleMatch::where('user_one_id',$user)->where('user_two_id',$suggestedUser)->first()) {
            $match->update([
                'has_user_one_liked' => false
            ]);
        }
        else if ($match = SingleMatch::where('user_two_id',$user)->where('user_one_id',$suggestedUser)->first()){
            $match->Update([
                'has_user_two_liked' => false
            ]);
        }else{
            $match = SingleMatch::create([
                'user_one_id' => $user,
                'user_two_id' => $suggestedUser,
                'has_user_one_liked'=> false
            ]);
        }

        return $match->isMatch();

    }


}
