<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class User extends Model
{
    use HasFactory;
    public function company(){
        return $this->hasOneThrough(PhoneNumber::class, Company::class);
    }

    // public function company(){
    //     return $this->hasOne(Company::class);
    // }
}
