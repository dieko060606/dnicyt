<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Proyecto;

class Investigador extends Model
{
    use HasFactory;
    protected $table = 'investigadores';
    // app/Models/Investigador.php
    protected $fillable = ['nombre', 'unidad_academica', 'proyecto_id'];

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class);
    }
}
