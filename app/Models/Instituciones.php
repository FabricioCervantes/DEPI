<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instituciones extends Model
{
    use HasFactory;
    protected $table = 'instituciones';
    public $timestamps = false;
    protected $primaryKey = 'idIns';
    protected $fillable = [
        'nombre',
    ];
}
