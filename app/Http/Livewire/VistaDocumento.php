<?php

namespace App\Http\Livewire;

use App\Models\Artículos;
use App\Models\Proyectos;
use App\Models\Tesis;
use DragonCode\Contracts\Cashier\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class VistaDocumento extends Component
{

    public function render()
    {
        $id = request('id');
        $tipo = request('tipo');

        if ($tipo === '1') {
            $documento = Artículos::leftjoin('docs', 'articulos.idDoc', 'docs.idDoc')
                ->leftjoin('docs-autores', 'docs.idDoc', 'docs-autores.idDoc')
                ->leftjoin('autores', 'docs-autores.idAutor', 'autores.idAutor')
                ->select('articulos.autor', 'articulos.idDoc', 'articulos.idArticulo', 'articulos.revista', 'articulos.volumen', 'articulos.titulo', 'articulos.fecha', 'articulos.abstract', DB::raw("group_concat(' ',autores.nombre, ' ', autores.apellidos) as autorNombre"), 'docs.url')
                ->where('articulos.idDoc', $id)
                ->get();
        }
        if ($tipo === '2') {
            $documento = Tesis::leftjoin('docs', 'tesis.idDoc', 'docs.idDoc')
                ->leftjoin('docs-autores', 'docs.idDoc', 'docs-autores.idDoc')
                ->leftjoin('autores', 'docs-autores.idAutor', 'autores.idAutor')
                ->select('tesis.departamento', 'tesis.idDoc', 'tesis.idTesis', 'tesis.asesor', 'tesis.nivel', 'tesis.titulo', 'tesis.fecha', 'tesis.abstract', DB::raw("group_concat(' ',autores.nombre, ' ', autores.apellidos) as autorNombre"), 'docs.url')
                ->where('tesis.idDoc', $id)
                ->get();
        }

        if ($tipo === '3') {
            $documento = Proyectos::leftjoin('docs', 'proyectos.idDoc', 'Docs.idDoc')
                ->leftjoin('autores', 'autores.idAutor', 'proyectos.encargado')
                ->select('proyectos.fechaFin', 'proyectos.idProyecto', 'docs.url', 'proyectos.idDoc', 'proyectos.descripcion', 'proyectos.financiamiento', 'proyectos.titulo', 'proyectos.fechaInicio', 'autores.nombre', 'autores.apellidos')
                ->where('proyectos.idDoc', $id)
                ->get();
        }


        return view('livewire.vista-documento', compact('documento', 'tipo'));
    }

    function descargarPDF()
    {
    }
}
