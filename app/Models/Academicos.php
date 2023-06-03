<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academicos extends Model
{
    use HasFactory;
    protected $table = 'academicos';
    public $timestamps = false;

    protected $primaryKey = 'idAcad';

    protected $fillable = [
        'expediente',
        'cvu',
    ];
}