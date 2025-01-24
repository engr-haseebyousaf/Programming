<?php

namespace App\Models;

use App\Http\Controllers\PhoneController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Owner extends Model
{
    // use HasFactory;
    protected $guarded = [];
    public $timestamps = false;
    public function phone(){
        return $this->hasMany(Phone::class, "owner_id", "id");
    }
}
