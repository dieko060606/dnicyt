<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\InvestigadorController;
use App\Http\Controllers\EvaluacionController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProyectoController::class, 'welcome']);

// RUTA CRESTRINGIDA PARA EVALUADORES 
Route::group(['middleware' => 'auth'], function () {
    Route::get('/evaluaciones', [EvaluacionController::class, 'index'])->name('evaluaciones.index');
    Route::post('/evaluaciones/submit', [EvaluacionController::class, 'submit'])->name('evaluaciones.submit');
    Route::get('/proyectos/registrar', [ProyectoController::class, 'registrar'])->name('proyecto.registrar');
    Route::post('/proyectos/registrar', [ProyectoController::class, 'store']);
    Route::get('/investigadores/registrar', [InvestigadorController::class, 'create'])->name('investigadores.registrar');
    Route::post('/investigadores/registrar', [InvestigadorController::class, 'store']);
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
});
Route::get('/obtener-categoria/{proyectoId}', 'EvaluacionController@obtenerCategoria');



Route::get('/proyecto/{proyecto_id}/asociar', [ProyectoController::class, 'asociarInvestigadores']);
Route::post('/proyecto/{proyecto_id}/asociar', [ProyectoController::class, 'guardarAsociacion']);
Auth::routes();

Route::get('/home', [ProyectoController::class, 'welcome']);
