<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
