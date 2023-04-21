<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docs extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = 'docs';
    public $timestamps = false;

    protected $primaryKey = 'idDoc';

    protected $fillable = [
        'idDoc',
        'tipo',
        'url',
        'idUsuario',

    ];
}