<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function tags(){
        return $this->morphToMany(Tag::class, "taggable", "taggable", "taggable_id");
    }
}
