<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Inertia\Inertia;

class CourseController extends Controller
{
    //
     public function index()
    {
        //

       // echo "Hola desde el controlador de courses";
        //$courses = Course::all();
        //dd($courses);
        return inertia::render('Course/Index', [
            //'courses' => $courses
        ]);
    }
    public function create()
    {
        //

       // echo "Hola desde el controlador de courses";
        //$courses = Course::all();
        //dd($courses);
        return inertia::render('Course/Create', [
            //'courses' => $courses
        ]);
    }
}
