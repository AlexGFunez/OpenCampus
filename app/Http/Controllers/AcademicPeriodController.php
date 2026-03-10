<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AcademicPeriod;
use Inertia\Inertia;

class AcademicPeriodController extends Controller
{
    //
     public function index()
    {
        //

        echo "Hola desde el controlador de AcademicPeriod";
        $academicPeriods = AcademicPeriod::all();
        dd($academicPeriods);
        return inertia::render('AcademicPeriod/Index', [
            'academicPeriods' => $academicPeriods
        ]);
    }
}

