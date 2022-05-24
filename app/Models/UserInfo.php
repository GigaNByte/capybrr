<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class UserInfo extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'location',
        'gender',
        'age',
        'profile_image',
        'relationship',
        'description',
        'species'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getPicture()
    {
        if ($this->profile_image == null) {
            return Storage::url('app/images/default.png');
        }
        return Storage::url($this->profile_image);
    }

}
