<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\Investigador;
class ProyectoController extends Controller
{
    public function registrar()
    {
        return view('proyectos.registrar');
    }
    public function welcome()
    {
        $proyectos = Proyecto::all();
        return view('welcome', compact('proyectos'));

    }
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'categoria' => 'required|in:formativo,profesionalizante,institucional,tecnologico,militar'
            // Agrega más validaciones para otros campos según sea necesario
        ]);

        $proyecto = Proyecto::create([
            'nombre' => $request->nombre,
            'categoria' => $request->categoria,
            'unidad_academica' => $request->unidad_academica,
            'investigadores'=>1000,
            'brochure_path'=> $request->brochure_path
            // Otros campos
        ]);
        return redirect('/')->with('success', 'El proyecto se ha registrado correctamente');
    }


    public function asociarInvestigadores($proyecto_id)
    {
        $proyecto = Proyecto::findOrFail($proyecto_id);
        $investigadores = Investigador::all(); // Obtén la lista de investigadores

        return view('proyectos.asociar_investigadores', compact('proyecto', 'investigadores'));
    }

    public function guardarAsociacion(Request $request, $proyecto_id)
    {
        $proyecto = Proyecto::findOrFail($proyecto_id);

        // Asociar los investigadores seleccionados
        $proyecto->investigadores()->sync($request->input('investigadores'));

        return redirect()->route('proyecto.show', $proyecto->id)->with('success', 'Investigadores asociados correctamente');
    }
}
