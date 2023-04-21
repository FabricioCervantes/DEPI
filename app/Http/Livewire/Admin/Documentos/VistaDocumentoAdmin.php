<?php

namespace App\Http\Livewire\Admin\Documentos;

use App\Models\Artículos;
use App\Models\Proyectos;
use App\Models\Tesis;
use Livewire\Component;

class VistaDocumentoAdmin extends Component
{
    public function render()
    {

        $id = request('id');
        $tipo = request('tipo');

        if ($tipo === '1') {
            $documento = Artículos::leftjoin('docs', 'articulos.idDoc', 'docs.idDoc')
                ->leftjoin('docs-autores', 'docs.idDoc', 'docs-autores.idDoc')
                ->leftjoin('autores', 'docs-autores.idAutor', 'autores.idAutor')
                ->select('articulos.autor', 'articulos.idDoc', 'articulos.idArticulo', 'articulos.revista', 'articulos.volumen', 'articulos.titulo', 'articulos.fecha', 'autores.nombre as autorNombre', 'autores.apellidos as autorApellido', 'docs.url')
                ->where('articulos.idDoc', $id)
                ->get();
        }
        if ($tipo === '2') {
            $documento = Tesis::leftjoin('docs', 'tesis.idDoc', 'docs.idDoc')
                ->leftjoin('docs-autores', 'docs.idDoc', 'docs-autores.idDoc')
                ->leftjoin('autores', 'docs-autores.idAutor', 'autores.idAutor')
                ->select('tesis.departamento', 'tesis.idDoc', 'tesis.idTesis', 'tesis.asesor', 'tesis.nivel', 'tesis.titulo', 'tesis.fecha', 'docs.url')
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
        return view('livewire.admin.documentos.vista-documento-admin', compact('documento'));
    }
}
