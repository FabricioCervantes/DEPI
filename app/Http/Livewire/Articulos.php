<?php

namespace App\Http\Livewire;

use App\Models\Artículos;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Livewire\WithPagination;

class Articulos extends Component
{

    use WithPagination;
    public $cant = 10;
    public $search;
    public $autor;
    public $nombres = [];

    public function render()
    {

        $articulos =
            Artículos::leftjoin('docs', 'articulos.idDoc', 'docs.idDoc')
            ->leftjoin('docs-autores', 'docs.idDoc', 'docs-autores.idDoc')
            ->leftjoin('autores', 'docs-autores.idAutor', 'autores.idAutor')
            ->select('articulos.autor', 'articulos.idDoc', 'articulos.revista', 'articulos.volumen', 'articulos.titulo', 'articulos.fecha', DB::raw("group_concat(distinct' ',autores.nombre, ' ', autores.apellidos) as autorNombre"))
            ->where('articulos.titulo', 'like', '%' . $this->search . '%')
            ->orWhere('autores.apellidos', 'like', '%' . $this->search . '%')
            ->groupBy('articulos.idDoc')
            ->paginate($this->cant);

        foreach ($articulos as $item) {
            $nombres = preg_split("/\,/", $item->autorNombre);
        }

        return view('livewire.articulos', compact('articulos'));
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
