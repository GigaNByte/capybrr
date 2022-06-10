<?php

namespace App\Services;

use App\Models\Match;
use App\Models\User;

class AdminStatsService
{
    public function getStats(): array {
        $most_popular = Match::matchesQuery()->withCount('userOne')->orderBy('user_one_count','desc')->first();

        if (isset($most_popular->userOne)){
            $most_popular = $most_popular->userOne;
        }

        return array(
            'users' => User::where('role','user')->count(),
            'matches' => Match::matchesQuery()->count(),
            'most_popular' =>  $most_popular,
            'matches_per_day' => Match::MatchesPerDayFromSubMonthRawQuery()
        );
    }

}
