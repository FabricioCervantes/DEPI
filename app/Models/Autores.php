<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autores extends Model
{
    use HasFactory;

    protected $table = 'autores';
    public $timestamps = false;
    protected $primaryKey = 'idAutor';

    protected $fillable = [
        'nombre',
        'apellidos',
        'sexo',
    ];
}
