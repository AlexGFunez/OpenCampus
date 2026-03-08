<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participante;

class PremiosController extends Controller
{
    public function index()
    {
        $premios = [
            'Galleta',
            'Paleta',
            'Sticker',
            'Llavero',
            'Pin',
            '50lps'
        ];

        $participantes = Participante::latest()->get();

        return view('premios', compact('premios', 'participantes'));
    }

    public function guardar(Request $request)
    {
        // Aquí ya recibes el premio correcto desde el input oculto
        $premioSeleccionado = $request->premio;

        Participante::create([
            'nombre' => $request->nombre,
            'escuela' => $request->escuela,
            'premio' => $premioSeleccionado
        ]);

        return redirect('/premio');
    }
}