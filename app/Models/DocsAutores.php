<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocsAutores extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = 'docs-autores';
    public $timestamps = false;

    protected $primaryKey = 'idDocsAutores';

    protected $fillable = [
        'idDoc',
        'idAutor',
    ];
}