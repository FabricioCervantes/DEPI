<?php

namespace App\Http\Livewire;

use App\Models\Instituciones;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Administracion extends Component
{
    public function render()
    {
        $instituciones = DB::table('instituciones')
            ->select('*')
            ->paginate(3);

        $usuarios = DB::table('usuario')
            ->leftjoin('instituciones', 'usuario.idIns', 'instituciones.idIns')
            ->select('usuario.nombre', 'usuario.idUsuario', 'apellidos', 'correo', 'area', 'telefono', 'tipou', 'instituciones.nombre as insNombre')
            ->orderByDesc('usuario.idUsuario')
            ->paginate(3);
        return view('livewire.admin.administracion', compact('usuarios', 'instituciones'));
    }
}