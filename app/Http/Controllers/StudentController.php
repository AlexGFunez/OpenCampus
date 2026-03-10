<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

       // echo "Hola desde el controlador de estudiantes";
        //$estudiantes = Student::all();
        //dd($estudiantes);
        return inertia::render('Student/Index', [
            //'estudiantes' => $estudiantes
        ]);
    }

    
}
