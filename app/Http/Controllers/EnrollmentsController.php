<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use Inertia\Inertia;

class EnrollmentsController extends Controller
{
    //
     public function index()
    {
        //

        //echo "Hola desde el controlador de enrollments";
        //$enrollments = Enrollment::all();
        //dd($enrollments);
        return inertia::render('Enrollment/Index', [
            //'enrollments' => $enrollments
        ]);
    }
    public function create()
    {
        //

        //echo "Hola desde el controlador de enrollments";
        //$enrollments = Enrollment::all();
        //dd($enrollments);
        return inertia::render('Enrollment/Create', [
            //'enrollments' => $enrollments
        ]);
    }

}
