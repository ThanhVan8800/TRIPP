<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DisLike extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function Post()
    {
        return $this->hasMany(Post::class);
    }
}
