<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    public function posts()
    {
        // hasManyThrough(Post, through User, user.country_id, post.user_id, country.id, user.id)
        return $this->hasManyThrough(Post::class, User::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
