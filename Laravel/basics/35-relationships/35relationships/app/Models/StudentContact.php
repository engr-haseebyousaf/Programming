<?php

namespace App\Models;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentContact extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = "studentContactId";

    public function student():BelongsTo{
        return $this->belongsTo(related: Student::class, foreignKey: "studentTableId", ownerKey: "studentId");
    }
}
