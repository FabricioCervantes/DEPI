<?php

namespace App\Http\Livewire\Admin\Documentos;

use App\Http\Livewire\Articulos;
use App\Models\Artículos;
use App\Models\Autores;
use App\Models\DocsAutores;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ArticulosAdmin extends Component
{

    use WithPagination;
    public $cant = 10;
    public $search;

    public $titulo, $autorNombre = [], $autorApellido = [], $volumen, $revista, $fecha, $idArticulo, $idAutor = [];


    public $modal = false;


    public function render()
    {
        $articulos =
            Artículos::leftjoin('docs', 'articulos.idDoc', 'docs.idDoc')
            ->leftjoin('docs-autores', 'docs.idDoc', 'docs-autores.idDoc')
            ->leftjoin('autores', 'docs-autores.idAutor', 'autores.idAutor')
            ->select('articulos.autor', 'articulos.idDoc', 'articulos.revista', 'articulos.volumen', 'articulos.titulo', 'articulos.fecha', 'autores.idAutor', DB::raw("group_concat(distinct' ',autores.nombre, ' ', autores.apellidos) as autorNombre"))
            ->where('articulos.titulo', 'like', '%' . $this->search . '%')
            ->orWhere('autores.apellidos', 'like', '%' . $this->search . '%')
            ->groupBy('articulos.idDoc')
            ->paginate($this->cant);

        return view('livewire.admin.documentos.articulos-admin', compact('articulos'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function abrirModal($id)
    {
        $this->vaciarNombres();


        $doc = Artículos::leftjoin('docs', 'articulos.idDoc', 'docs.idDoc')
            ->leftjoin('docs-autores', 'docs.idDoc', 'docs-autores.idDoc')
            ->leftjoin('autores', 'docs-autores.idAutor', 'autores.idAutor')
            ->select('articulos.idDoc', 'articulos.revista', 'articulos.volumen', 'articulos.titulo', 'articulos.fecha', 'docs.url', 'autores.nombre as autorNombre', 'autores.idAutor', 'autores.apellidos as autorApellido')
            ->where('articulos.idDoc', $id)
            ->groupBy('autores.nombre')
            ->get();


        $this->titulo = $doc[0]->titulo;
        $this->revista = $doc[0]->revista;
        $this->fecha = $doc[0]->fecha;
        $this->volumen = $doc[0]->volumen;
        $this->idArticulo = $doc[0]->idDoc;




        foreach ($doc as $item) {
            array_push($this->autorNombre, $item->autorNombre);
            array_push($this->autorApellido, $item->autorApellido);
            array_push($this->idAutor, $item->idAutor);
        }
        $this->modal = true;
    }

    public function delete($idDoc, $idAutor)
    {

        Artículos::where('idDoc', $idDoc)->delete();
        DocsAutores::where('idDoc', $idDoc)->delete();
        Autores::where('idAutor', $idAutor)->delete();

        $this->vaciarNombres();
        $this->cerrarModal();
    }

    public function editarArticulo()
    {

        $doc = Artículos::find($this->idArticulo);

        $doc->titulo = $this->titulo;
        $doc->revista = $this->revista;
        $doc->volumen = $this->volumen;
        $doc->fecha = $this->fecha;
        $doc->save();

        for ($i = 0; $i < count($this->idAutor); $i++) {
            $Autor = Autores::find($this->idAutor[$i]);
            $Autor->nombre = $this->autorNombre[$i];
            $Autor->apellidos = $this->autorApellido[$i];
            $Autor->save();
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
        $this->autorNombre = array();
        $this->autorApellido = array();
        $this->idAutor = array();
    }
}
