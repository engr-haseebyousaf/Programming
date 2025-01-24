<?php

namespace App\Models;

use App\Http\Controllers\OwnerController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function owner(){
        return $this->belongsTo(Owner::class, "owner_id", "id");
    }
}
