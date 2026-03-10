<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Faculty;
use App\Models\Enrollment;
use App\Models\Course;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'student_code',
        'enrollment_date',
        'status',
        // 'user_id', // Relación con el modelo User
    ];

    use SoftDeletes;
    
    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'enrollments');
    }
}