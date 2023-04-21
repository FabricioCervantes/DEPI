<?php

namespace App\Http\Livewire;

use App\Models\Tesis as ModelsTesis;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Livewire\WithPagination;

class Tesis extends Component
{

    use WithPagination;
    public $cant = 10;
    public $search;
    public $autor;


    public function render()
    {
        $tesis =
            ModelsTesis::leftjoin('docs', 'tesis.idDoc', 'docs.idDoc')
            ->leftjoin('docs-autores', 'docs.idDoc', 'docs-autores.idDoc')
            ->leftjoin('autores', 'docs-autores.idAutor', 'autores.idAutor')
            ->select('tesis.departamento', 'tesis.idDoc', 'tesis.asesor', 'tesis.nivel', 'tesis.titulo', 'tesis.fecha')
            ->where('tesis.titulo', 'like', '%' . $this->search . '%')
            ->orWhere('autores.apellidos', 'like', '%' . $this->search . '%')
            ->groupBy('tesis.idDoc')
            ->paginate($this->cant);
        return view('livewire.tesis', compact('tesis'));
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
