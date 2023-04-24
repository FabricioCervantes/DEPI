<?php

namespace App\Http\Livewire\Admin\Documentos;

use App\Models\Autores;
use App\Models\DocsAutores;
use App\Models\Tesis;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Livewire\WithPagination;

class TesisAdmin extends Component
{
    use WithPagination;
    public $cant = 10;
    public $search;

    public $titulo, $autorNombre, $autorApellido, $nivel, $asesor, $año, $departamento, $idTesis, $idAutor;

    public $modal = false;

    // public $doc;

    public function render()
    {
        $tesis =
            Tesis::leftjoin('docs', 'tesis.idDoc', 'docs.idDoc')
            ->leftjoin('docs-autores', 'docs.idDoc', 'docs-autores.idDoc')
            ->leftjoin('autores', 'docs-autores.idAutor', 'autores.idAutor')
            ->select('tesis.departamento', 'tesis.idDoc', 'tesis.asesor', 'tesis.nivel', 'tesis.titulo', 'tesis.fecha')
            ->where('tesis.titulo', 'like', '%' . $this->search . '%')
            ->orWhere('autores.apellidos', 'like', '%' . $this->search . '%')
            ->groupBy('tesis.idDoc')
            ->paginate($this->cant);
        return view('livewire.admin.documentos.tesis-admin', compact('tesis'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function abrirModal($id)
    {
        // $this->doc = Tesis::find($id);

        $doc = Tesis::leftjoin('docs', 'tesis.idDoc', 'docs.idDoc')
            ->leftjoin('docs-autores', 'docs.idDoc', 'docs-autores.idDoc')
            ->leftjoin('autores', 'docs-autores.idAutor', 'autores.idAutor')
            ->select('tesis.departamento', 'tesis.idDoc',  'tesis.asesor', 'tesis.nivel', 'tesis.titulo', 'tesis.fecha', 'docs.url', 'autores.nombre as autorNombre', 'autores.idAutor',  'autores.apellidos as autorApellido')
            ->where('tesis.idDoc', $id)
            ->get();

        $this->titulo = $doc[0]->titulo;
        $this->autorNombre = $doc[0]->autorNombre;
        $this->autorApellido = $doc[0]->autorApellido;
        $this->nivel = $doc[0]->nivel;
        $this->asesor = $doc[0]->asesor;
        $this->año = $doc[0]->fecha;
        $this->departamento = $doc[0]->departamento;
        $this->idTesis = $doc[0]->idDoc;
        $this->idAutor = $doc[0]->idAutor;


        $this->modal = true;
    }

    public function delete($idDoc, $idAutor)
    {

        Tesis::where('idDoc', $idDoc)->delete();
        DocsAutores::where('idDoc', $idDoc)->delete();
        Autores::where('idAutor', $idAutor)->delete();

        $this->cerrarModal();
    }

    public function editarTesis()
    {

        $doc = Tesis::find($this->idTesis);

        $doc->titulo = $this->titulo;
        $doc->nivel = $this->nivel;
        $doc->asesor = $this->asesor;
        $doc->fecha = $this->año;
        $doc->departamento = $this->departamento;
        $doc->save();

        $autor = Autores::find($this->idAutor);

        $autor->nombre = $this->autorNombre;
        $autor->apellidos = $this->autorApellido;
        $autor->save();

        $this->cerrarModal();
    }
    public function cerrarModal()
    {
        $this->modal = false;
    }
}
