<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Match extends Model
{
    protected $fillable = [
        'user_one_id',
        'user_two_id',
        'has_user_one_liked',
        'has_user_two_liked',
    ];

    public function userOne()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_one_id');
    }
    public function userTwo()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_two_id');
    }
}
