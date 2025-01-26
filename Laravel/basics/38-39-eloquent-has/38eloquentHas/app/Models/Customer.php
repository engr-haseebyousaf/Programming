<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function order(){
        return $this->hasMany(Order::class);
    }
    public function latestOrder(){
        return $this->hasOne(Order::class)->latestOfMany();
    }
    public function oldestOrder(){
        return $this->hasOne(Order::class)->oldestOfMany();
    }
    public function largestOrder(){
        return $this->hasOne(Order::class)->ofMany("amount", "max");
    }
    public function smallestOrder(){
        return $this->hasOne(Order::class)->ofMany("amount", "min");
    }
    
}
