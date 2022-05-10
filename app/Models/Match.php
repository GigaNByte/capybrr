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

    public function user()
    {
        return $this->belongsTo('App\User', 'user_one_id');
    }
}
