<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


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

}
