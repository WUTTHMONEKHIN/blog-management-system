<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Admin extends User
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'email', 'password'];
    protected $appends = ['image_url'];
    public function getImageUrlAttribute()
    {
        return asset('/images/admins/' . $this->image);
    }
}