<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;
    protected $primaryKey = "userId";
    public $timestamps = false;
    protected $guarded = [];

    // public function getNameAttribute($value){
    //     return ucwords($value);
    // }
    // public function setEmailAttribute($value){
    //     $this->attributes["email"] = strtolower($value);
    // }
    protected function Name():Attribute{
        return Attribute::make(
            get:fn(string $value) => ucwords($value),
            set:fn(string $value) => ucwords($value),
        );
    }
    protected function Email():Attribute{
        return Attribute::make(
            set:fn(string $value) => strtolower($value),
        );
    }
}
