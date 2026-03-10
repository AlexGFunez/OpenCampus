<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class AcademicPeriod extends Model
{
    /** @use HasFactory<\Database\Factories\AcademicPeriodFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'status',
    ];
}