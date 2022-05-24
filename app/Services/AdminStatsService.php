<?php

namespace App\Services;

use App\Models\Match;
use App\Models\User;

class AdminStatsService
{
    public function getStats(): array {
        $most_popular = Match::where('has_user_one_liked',true,)->where('has_user_two_liked',true)->withCount('userOne')->orderBy('user_one_count','desc')->first();;
        if (!isset($most_popular)){
            $most_popular = 'None';
        }

        return array(
            'users' => User::where('role','user')->count(),
            'matches' => Match::all()->count(),
            'most_popular' =>  $most_popular,
           // 'matches_per_day_table' => $this->countMatchesPerDay()
        );
    }

}
