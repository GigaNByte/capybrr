<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    protected $fillable = [
        'name',
        'icon',
    ];
    public function users()
    {
        return $this->belongsToMany(UserInfo::class, 'interests_users');
    }
}
