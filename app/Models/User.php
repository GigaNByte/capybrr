<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'role',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function info()
    {
        return $this->hasOne(UserInfo::class);
    }

    public function interests()
    {
        return $this->belongsToMany(Interest::class,'interests_users','user_id','interest_id')->withTimestamps();
    }



    public function userLiked()
    {
        return $this->belongsToMany(User::class, 'matches', 'user_two_id', 'user_one_id')->withTimestamps();;
    }

    public function likedUser()
    {
        return $this->belongsToMany(User::class, 'matches', 'user_one_id', 'user_two_id')->withTimestamps();;
    }
//create scope query for users who was not matched or liked



    public function scopeUserWithoutReactionQuery($query, $id)
    {
        return $query->whereDoesntHave('userLiked', function ($query) use ($id) {
            $query->where([['user_one_id', $id],['has_user_one_liked',true]])
                ->orWhere([['user_two_id',$id], ['has_user_two_liked',true]]);
        })->WhereDoesntHave('userLiked', function ($query) use ($id) {
            $query->where([['has_user_two_liked', true], ['has_user_one_liked', true]]);
        })->WhereDoesntHave('likedUser', function ($query) use ($id) {
            $query->where([['has_user_two_liked', true], ['has_user_one_liked', true]]);
        });;
    }


}
