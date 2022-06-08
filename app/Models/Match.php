<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Match extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_one_id',
        'user_two_id',
        'has_user_one_liked',
        'has_user_two_liked',
    ];

    public function userOne()
    {
        return $this->belongsTo(User::class, 'user_one_id');
    }
    public function userTwo()
    {
        return $this->belongsTo(User::class, 'user_two_id');
    }

    public function isMatch()
    {
        $user_one = $this->attributes['user_one_id'];
        $user_two = $this->attributes['user_two_id'];

        return $this->where('user_one_id',$user_one)
           ->where('user_two_id',$user_two)
           ->where('has_user_one_liked',$user_one)
           ->where('has_user_two_liked',$user_two)->exists();
    }

    public function scopeMatchesQuery($query)
    {
        return $query->where('has_user_one_liked',true )->where('has_user_two_liked',true );
    }


    public function MatchesPerDayFromSubMonthRawQuery(){

        $period = CarbonPeriod::create(Carbon::now()->subMonth(),Carbon::now());

        foreach ($period as $date) {
            $data[$date->format('Y-m-d')] = 0;
        }

        $matches = DB::table('matches')
            ->select(DB::raw('DATE(updated_at) as time'), DB::raw('count(*) as count'))
            ->where('has_user_one_liked',true )
            ->where('has_user_two_liked',true )
            ->where('updated_at', '>=', Carbon::now()->subMonth())
            ->groupBy('time')
            ->get();

        foreach($matches as $match){
            $data[$match->time] = $match->count;
        }

        return json_encode($data);

    }

}
