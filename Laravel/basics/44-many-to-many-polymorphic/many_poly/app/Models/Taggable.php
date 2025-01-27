<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Taggable extends Model
{
    protected $primaryKey = null;
    public $timestamps = false;
    protected $guarded = [];
}
