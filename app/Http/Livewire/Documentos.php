<?php

namespace App\Http\Livewire;

use App\Models\Artículos;
use App\Models\Tesis;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Livewire\WithPagination;

class Documentos extends Component
{
    use WithPagination;
    public $cant = 10;
    public $search;
    public $autor;


    public function render()
    {
        $articulos =
            Artículos::leftjoin('docs', 'articulos.idDoc', 'docs.idDoc')
            ->leftjoin('docs-autores', 'docs.idDoc', 'docs-autores.idDoc')
            ->leftjoin('autores', 'docs-autores.idAutor', 'autores.idAutor')
            ->select('articulos.autor', 'articulos.idDoc', 'articulos.revista', 'articulos.volumen', 'articulos.titulo', 'articulos.fecha', 'autores.nombre as autorNombre', 'autores.apellidos as autorApellido')
            ->where('articulos.titulo', 'like', '%' . $this->search . '%')
            ->orWhere('autores.apellidos', 'like', '%' . $this->search . '%')
            ->groupBy('articulos.idDoc')
            ->paginate($this->cant);

        return view('livewire.documentos', compact('articulos'));
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