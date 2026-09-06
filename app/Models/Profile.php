<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id', 'full_name', 'professional_title', 'phone', 'short_bio',
        'about', 'profile_image', 'about_image', 'email', 'location',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
