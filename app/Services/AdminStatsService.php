<?php

namespace App\Services;

use App\Models\SingleMatch;
use App\Models\User;

class AdminStatsService
{
    public function getStats(): array {
        $most_popular = SingleMatch::matchesQuery()->withCount('userOne')->orderBy('user_one_count','desc')->first();

        if (isset($most_popular->userOne)){
            $most_popular = $most_popular->userOne;
        }

        return array(
            'users' => User::where('role','user')->count(),
            'matches' => SingleMatch::matchesQuery()->count(),
            'most_popular' =>  $most_popular,
            'matches_per_day' => SingleMatch::MatchesPerDayFromSubMonthRawQuery()
        );
    }

}
