<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];
    public function posts(){
        return $this->hasMany(Post::class);
    }

    protected static function booted(){
        static::deleted(function($user){
            $user->posts()->delete();
        });
    }
}
