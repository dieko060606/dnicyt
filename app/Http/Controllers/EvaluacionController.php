<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\ProyectoController;
use App\Models\Investigador;
use App\Models\Proyecto;
use App\Models\Evaluacion;
class EvaluacionController extends Controller
{
    // EvaluacionController.php

    public function index()
    {
        $proyectos = Proyecto::all(); // Asegúrate de tener acceso a los proyectos
        return view('evaluadores.index', compact('proyectos'));
    }
    public function obtenerCategoria($proyectoId) {
        $proyecto = Proyecto::find($proyectoId);
        $categoria = $proyecto->categoria;
        return response()->json(['categoria' => $categoria]);
    }
    
    public function submit(Request $request)
    {
        $request->validate([
            'proyecto_id' => 'required|exists:proyectos,id',
            'puntuacion' => 'required|numeric|min:1|max:10',
            // Agrega más validaciones según tus necesidades
        ]);
        //validar que no evalue dos veces
        $evaluadorId = auth()->user()->id;
        $proyectoId = $request->proyecto_id;
    
        $evaluacionExistente = Evaluacion::where('evaluador_id', $evaluadorId)
                                         ->where('proyecto_id', $proyectoId)
                                         ->first();
    
        if ($evaluacionExistente) {
            return redirect()->back()->with('error', 'Ya has evaluado este proyecto.');
        }
        else
        {
                // Crea la evaluación
            Evaluacion::create([
                'proyecto_id' => $request->proyecto_id,
                'jurado_id' => auth()->user()->id,
                'puntuacion' => $request->puntuacion,
                // Agrega más campos según tus necesidades
        ]);

        return redirect()->route('evaluaciones.index')->with('success', 'Evaluación enviada exitosamente.');
        }
        
    }

}
