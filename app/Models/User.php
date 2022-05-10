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
        return $this->belongsToMany(Interest::class,'interests_users_info','interest_id','user_id');
    }
    public function match(User $foreignUser)
    {
        $thisMatched = $this->belongsToMany(User::class, 'matches',
            'user_one_id', 'user_two_id')->getResults();

        $matchedThis = $this->belongsToMany(User::class, 'matches',
            'user_two_id', 'user_one_id')->getResults();

        if (isset($thisMatched[0]->attributes['id']) && isset($matchedThis[0]->attributes['id'])) {
            return $foreignUser;
        } else {
            return null;
        }
    }


}
