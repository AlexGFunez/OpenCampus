<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Premio;
use App\Models\Participante;   // singular
use Inertia\Inertia;

class PremiosController extends Controller
{
    public function index()
    {
        $premios = Premio::all();
        $participantes = Participante::all(); // singular

        return Inertia::render('Premios', [
            'premios' => $premios,
            'participantes' => $participantes
        ]);
    }

    public function registrarParticipante(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:participantes,email',
        ]);

        Participante::create($request->only('nombre', 'email')); // singular

        return redirect()->back()->with('success', 'Participante registrado');
    }
}