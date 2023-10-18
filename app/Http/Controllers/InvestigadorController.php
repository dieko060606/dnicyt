<?php

namespace App\Http\Controllers;
use App\Models\Investigador;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class InvestigadorController extends Controller
{
    public function create()
    {
        //return view('investigadores.registrar');
        $proyectos = Proyecto::all(); // Obtener la lista de proyectos
        return view('investigadores.registrar', compact('proyectos'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'unidad_academica' => 'required|in:UALP,UASC,UACB,UAT,UAR',
            'proyecto_id' => 'required|exists:proyectos,id'
        ]);
    
        //Investigador::create($request->all());
        $investi = Investigador::create([
            'nombre' => $request->nombre,
            'unidad_academica' => $request->unidad_academica,
            'proyecto_id' => $request->proyecto_id
        ]);
    
        return redirect('/')->with('success', 'El investigador se ha registrado correctamente');
    }
}
