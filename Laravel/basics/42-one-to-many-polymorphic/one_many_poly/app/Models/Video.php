<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function comment(){
        return $this->morphMany(Comment::class, "commentable");
    }

    public function latestComment(){
        return $this->morphOne(Comment::class, "commentable")
        ->latestOfMany();
    }
    public function oldestComment(){
        return $this->morphOne(Comment::class, "commentable")
        ->oldestOfMany();
    }
    public function bestComment(){
        return $this->morphOne(Comment::class, "commentable")
        ->ofMany("likes", "max");
    }
    public function worstComment(){
        return $this->morphOne(Comment::class, "commentable")
        ->ofMany("likes", "min");
    }
}
