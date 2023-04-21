<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyectos extends Model
{
    use HasFactory;
    protected $table = 'proyectos';
    public $timestamps = false;
    protected $primaryKey = 'idDoc';

    protected $fillable = [
        'titulo',
        'encargado',
        'fechaInicio',
        'fechaFin',
        'descripcion',
        'financiado',
        'financiamiento',
        'idDoc',
        'fechaSubida'

    ];
}
