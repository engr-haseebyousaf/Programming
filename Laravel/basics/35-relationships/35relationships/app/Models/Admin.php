<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $primaryKey = "adminId";
    public $timestamps = false;
    public function roles(){
        return $this->belongsToMany(Role::class,"admins_roles", "admin_id", "role_id");
    }
    
}
