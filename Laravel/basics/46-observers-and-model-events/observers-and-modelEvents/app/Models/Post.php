<?php

namespace App\Models;

use App\Models\Scopes\UserScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];
    // public function scopeLiked($query){
    //     $query->where("likes",">", 100);
    // }

    // protected static function booted(){
    //     static::addGlobalScope("userdetail",function(Builder $builder){
    //         $builder->where("likes",">", 100);
    //     });
    // }

    protected static function booted(){
        static::addGlobalScope(new UserScope);
    }
}
