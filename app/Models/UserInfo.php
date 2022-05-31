<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class UserInfo extends Model
{
    use HasFactory;

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

    public function getProfileImage()
    {

        if ($this->profile_image == null) {
            return Storage::url('images/capybaras/cap_3.jpg');
        }
        return Storage::url($this->profile_image);
    }

}
