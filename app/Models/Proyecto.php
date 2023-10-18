<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Investigador;
use App\Models\Evaluacion;
class Proyecto extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'categoria', 'brochure_path', 'unidad_academica'];    
    public function investigadores()
    {
        return $this->hasMany(Investigador::class);
    }
    public function evaluaciones()
    {
        return $this->hasMany(Evaluacion::class);
    }
}
