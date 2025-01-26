<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function authors(){
        return $this->hasMany(Author::class);
    }
    public function posts(){
        return $this->hasManyThrough(Post::class, Author::class);
    }
    public function post(){
        return $this->hasMany(Post::class);
    }
    public function author(){
        return $this->hasMany(Author::class);
    }
}
