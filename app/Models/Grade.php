<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Enrollment;

class Grade extends Model
{
    use HasFactory;
    protected $fillable = [
        'enrollment_id',
        'grade',
    ];
    
    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class);
    }
}