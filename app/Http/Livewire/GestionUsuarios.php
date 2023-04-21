<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Livewire\WithPagination;

class GestionUsuarios extends Component
{

    use WithPagination;
    public $cant = 10;
    public $search;
    public $autor;
    public $modal = false;


    protected $listeners = ['render', 'borrar'];

    public function render()
    {
        $usuarios = DB::table('usuario')
            ->leftjoin('instituciones', 'usuario.idIns', 'instituciones.idIns')
            ->where('usuario.nombre', 'like', '%' . $this->search . '%')
            ->orWhere('usuario.apellidos', 'like', '%' . $this->search . '%')
            ->orWhere('usuario.correo', 'like', '%' . $this->search . '%')
            ->select('usuario.nombre', 'usuario.idUsuario', 'apellidos', 'correo', 'area', 'telefono', 'tipou', 'instituciones.nombre as insNombre')->paginate($this->cant);
        return view('livewire.admin.gestion-usuarios', compact('usuarios'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function borrar($id)
    {
        $user = DB::table('usuario')->where('idUsuario', $id);
        $user->delete();
    }
}
