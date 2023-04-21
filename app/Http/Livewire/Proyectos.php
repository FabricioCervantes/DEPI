<?php

namespace App\Http\Livewire;

use App\Models\Proyectos as ModelsProyectos;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Livewire\WithPagination;

class Proyectos extends Component
{

    use WithPagination;
    public $cant = 10;
    public $search;
    public $autor;


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

        return view('livewire.proyectos', compact('proy'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function vista($id, $tipo)
    {
        return Redirect::route('vista-documento', compact('id', 'tipo'));
    }
}
