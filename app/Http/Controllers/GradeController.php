<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use Inertia\Inertia;

class GradeController extends Controller
{
    //
     public function index()
    {
        //

        echo "Hola desde el controlador de Grade";
        $grades = Grade::all();
        dd($grades);
        return inertia::render('Grade/Index', [
            'grades' => $grades
        ]);
    }
}
