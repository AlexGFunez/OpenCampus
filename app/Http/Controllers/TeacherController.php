<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use Inertia\Inertia;

class TeacherController extends Controller
{
    //
     public function index()
    {
        //

        //echo "Hola desde el controlador de Teacher";
        //$teachers = Teacher::all();
        //dd($teachers);
        return inertia::render('Teacher/Index', [
          //  'teachers' => $teachers
        ]);
    }
}
