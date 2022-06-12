<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class SingleMatch extends Model
{
    use HasFactory;
    protected $table = 'matches';
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

        return (($this->has_user_two_liked == true) && ($this->has_user_one_liked == true));

    }

    public function getUserRelatedWithUserId($id)
    {
        $user_one = $this->attributes['user_one_id'];
        $user_two = $this->attributes['user_two_id'];

            if ($user_one == $id){
                return $this->userTwo;
            }else if ($user_two == $id){
                return $this->userOne;
            }else{
                return null;
            }
    }

    public function scopeMatchesQuery($query)
    {
        return $query->where('has_user_one_liked',true )->where('has_user_two_liked',true );
    }
    public function scopeLikesQuery($query)
    {
        return $query->where(
            function ($query) {
                $query->where('has_user_one_liked','!=',true)
                    ->orWhere('has_user_two_liked','!=',true);
            }
        )->where(
            function ($query) {
                $query->where('has_user_one_liked','!=',false)
                    ->orWhere('has_user_two_liked','!=',false);
            }
        );
//       [['has_user_one_liked','!=',true],['has_user_two_liked','!=',true ]])
//            ->where([['has_user_two_liked','!=',false],['has_user_one_liked','!=',false]]);

    }

    static public function  scopeMatchesByUserIdQuery($query,$id)
    {

        return SingleMatch::matchesQuery($query)->where(
            function ($query) use ($id) {
                $query->where('user_one_id',$id )
                    ->orWhere('user_two_id',$id);
            }
        );

    }

    static public function  scopeLikesByUserIdQuery($query,$id)
    {

        return SingleMatch::likesQuery($query)->where(
            function ($query) use ($id) {
                $query->where([['user_one_id',$id],['has_user_one_liked',true]])
                    ->orWhere([['user_two_id',$id], ['has_user_two_liked',true]]);
            }
        );

    }

    static public function MatchesPerDayFromSubMonthRawQuery(){

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
