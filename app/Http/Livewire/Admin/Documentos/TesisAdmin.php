<?php

namespace App\Http\Livewire\Admin\Documentos;

use App\Models\Autores;
use App\Models\DocsAutores;
use App\Models\Tesis;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class TesisAdmin extends Component
{
    use WithPagination;
    public $cant = 10;
    public $search;

    public $titulo,  $autorNombre = [], $autorApellido = [], $idAutor = [], $nivel, $asesor, $año, $departamento, $idTesis;

    public $modal = false;

    // public $doc;

    public function render()
    {

        $user = auth()->user();


        if ($user->hasRole('Admin')) {
            $tesis =
                Tesis::leftjoin('docs', 'tesis.idDoc', 'docs.idDoc')
                ->leftjoin('docs-autores', 'docs.idDoc', 'docs-autores.idDoc')
                ->leftjoin('autores', 'docs-autores.idAutor', 'autores.idAutor')
                ->select('tesis.departamento', 'tesis.idDoc', 'tesis.asesor', 'tesis.nivel', 'tesis.titulo', 'tesis.fecha')
                ->where('tesis.titulo', 'like', '%' . $this->search . '%')
                ->orWhere('autores.apellidos', 'like', '%' . $this->search . '%')
                ->groupBy('tesis.idDoc')
                ->paginate($this->cant);
        }

        if ($user->hasRole('Estudiante') or $user->hasRole('Academico')) {
            $tesis =
                Tesis::leftjoin('docs', 'tesis.idDoc', 'docs.idDoc')
                ->leftjoin('docs-autores', 'docs.idDoc', 'docs-autores.idDoc')
                ->leftjoin('autores', 'docs-autores.idAutor', 'autores.idAutor')
                ->select('tesis.departamento', 'tesis.idDoc', 'tesis.asesor', 'tesis.nivel', 'tesis.titulo', 'tesis.fecha')
                // ->where('tesis.titulo', 'like', '%' . $this->search . '%')
                ->where('docs.idUsuario', '=', $user->id)
                // ->orWhere('autores.apellidos', 'like', '%' . $this->search . '%')
                ->groupBy('tesis.idDoc')
                ->paginate($this->cant);
        }


        return view('livewire.admin.documentos.tesis-admin', compact('tesis', 'user'));
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
        $this->nivel = $doc[0]->nivel;
        $this->asesor = $doc[0]->asesor;
        $this->año = $doc[0]->fecha;
        $this->departamento = $doc[0]->departamento;
        $this->idTesis = $doc[0]->idDoc;


        foreach ($doc as $item) {
            array_push($this->autorNombre, $item->autorNombre);
            array_push($this->autorApellido, $item->autorApellido);
            array_push($this->idAutor, $item->idAutor);
        }


        $this->modal = true;
    }

    public function delete($idDoc)
    {

        Tesis::where('idDoc', $idDoc)->delete();
        DocsAutores::where('idDoc', $idDoc)->delete();
        foreach ($this->idAutor as $item) {
            Autores::where('idAutor', $item)->delete();
        }
        $this->vaciarNombres();
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

        foreach ($autor as $item) {
            $item->nombre = $this->autorNombre[0];
            $item->apellidos = $this->autorApellido[0];
            // dd($item);
            $item->save();
        }
        // dd($autor);

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