<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function likedByUsers(){
        return $this->belongsToMany(User::class, 'likes');
    }
}
