<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $primaryKey = "roleId";
    public $timestamps = false;
    public function admins(){
        return $this->hasMany(Admin::class, "admin_id", "roleId");
    }
}
