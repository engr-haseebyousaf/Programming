<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StudentContact;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Model
{
    use HasFactory;
    protected $primaryKey = "studentId";
    public $timestamps = false;

    public function contact():HasOne{
        return $this->hasOne(StudentContact::class, "studentTableId", "studentId");
    }
}
