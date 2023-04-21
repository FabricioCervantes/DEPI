<?php

namespace App\Http\Livewire\Admin\Documentos;

use App\Http\Livewire\Proyectos;
use App\Models\Autores;
use App\Models\Proyectos as ModelsProyectos;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ProyectosAdmin extends Component
{

    use WithPagination;
    public $cant = 10;
    public $search;

    public $titulo, $estadoFinanciamiento, $financiamiento, $fechaInicio, $fechaFin, $descripcion, $idProyecto;

    public $encargadoNombre = [], $encargadoApellido = [], $encargadoId = [];
    public $modal = false;

    public function render()
    {
        $proy =
            ModelsProyectos::leftjoin('docs', 'proyectos.idDoc', 'docs.idDoc')
            ->leftjoin('docs-autores', 'docs.idDoc', 'docs-autores.idDoc')
            ->leftjoin('autores', 'docs-autores.idAutor', 'autores.idAutor')
            ->select('proyectos.fechaFin', 'proyectos.idDoc', 'proyectos.descripcion', 'proyectos.financiamiento', 'proyectos.titulo', 'proyectos.fechaInicio')
            ->where('proyectos.titulo', 'like', '%' . $this->search . '%')
            ->orWhere('autores.apellidos', 'like', '%' . $this->search . '%')
            ->groupBy('proyectos.idDoc')
            ->paginate($this->cant);

        return view('livewire.admin.documentos.proyectos-admin', compact('proy'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function abrirModal($id)
    {
        $this->modal = true;
        $this->vaciarNombres();

        $proyecto = ModelsProyectos::leftjoin('docs', 'proyectos.idDoc', 'docs.idDoc')
            ->leftjoin('docs-autores', 'docs.idDoc', 'docs-autores.idDoc')
            ->leftjoin('autores', 'docs-autores.idAutor', 'autores.idAutor')
            ->select('proyectos.titulo', 'proyectos.fechaInicio', 'proyectos.idDoc', 'proyectos.fechaFin', 'proyectos.financiamiento', 'proyectos.financiado', 'proyectos.descripcion', 'autores.nombre as autorNombre', 'autores.idAutor', 'autores.apellidos as autorApellido')
            ->where('proyectos.idDoc', $id)
            ->groupBy('autores.nombre')
            ->get();

        $this->titulo = $proyecto[0]->titulo;
        $this->fechaInicio = $proyecto[0]->fechaInicio;
        $this->fechaFin = $proyecto[0]->fechaFin;
        $this->financiamiento = $proyecto[0]->financiamiento;
        $this->estadoFinanciamiento = $proyecto[0]->financiado;
        $this->fechaFin = $proyecto[0]->fechaFin;
        $this->descripcion = $proyecto[0]->descripcion;
        $this->idProyecto = $proyecto[0]->idDoc;

        foreach ($proyecto as $item) {
            array_push($this->encargadoNombre, $item->autorNombre);
            array_push($this->encargadoApellido, $item->autorApellido);
            array_push($this->encargadoId, $item->idAutor);
        }
        // dd($proyecto);
    }

    public function editarProyecto()
    {
        $proy = ModelsProyectos::find($this->idProyecto);
        $proy->titulo = $this->titulo;
        $proy->financiamiento = $this->financiamiento;
        $proy->fechaInicio = $this->fechaInicio;
        $proy->fechaFin = $this->fechaFin;
        $proy->descripcion = $this->descripcion;

        $proy->save();

        for ($i = 0; $i < count($this->encargadoId); $i++) {
            $participantes = Autores::find($this->encargadoId[$i]);
            $participantes->nombre = $this->encargadoNombre[$i];
            $participantes->apellidos = $this->encargadoApellido[$i];
            $participantes->save();
        }

        $this->vaciarNombres();
        $this->cerrarModal();
    }

    public function cerrarModal()
    {
        $this->modal = false;
    }

    public function vaciarNombres()
    {
        $this->encargadoNombre = array();
        $this->encargadoApellido = array();
        $this->encargadoId = array();
    }
}
