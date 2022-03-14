<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;
use App\Models\Like;
use App\Models\DiaDanh;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'user_id',
        'diadanhid',
        'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function diadanh()
    {
        return $this->belongsTo(DiaDanh::class);
    }
}
