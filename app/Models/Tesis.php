<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tesis extends Model
{
    use HasFactory;
    protected $table = 'tesis';
    public $timestamps = false;

    protected $primaryKey = 'idDoc';

    protected $fillable = [
        'titulo',
        'asesor',
        'fecha',
        'nivel',
        'departamento',
        'abstract',
        'idDoc',
        'fechaSubida'

    ];
}