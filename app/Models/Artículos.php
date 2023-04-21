<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artículos extends Model
{
    use HasFactory;
    protected $table = 'articulos';
    public $timestamps = false;
    protected $primaryKey = 'idDoc';

    protected $fillable = [
        'titulo',
        'volumen',
        'fecha',
        'revista',
        'abstract',
        'idDoc',
        'fechaSubida'

    ];
}