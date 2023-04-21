<?php

namespace App\Http\Livewire;

use App\Models\Artículos;
use App\Models\Instituciones;
use App\Models\Proyectos;
use App\Models\Tesis;
use DateTime;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Estadisticas extends Component
{
    public function render()
    {
        $tesis = Tesis::count();
        $articulos = Artículos::count();
        $proyectos = Proyectos::count();
        $instituciones = Instituciones::count();

        $subidasTotales = [];
        // $id = 4;

        for ($i = 0; $i < 12; $i++) {
            $te01 = Tesis::whereMonth('fechaSubida', $i)->count();
            $a01 = Artículos::whereMonth('fechaSubida', $i)->count();
            array_push($subidasTotales, $te01 + $a01);
        }




        return view('livewire.estadisticas', compact('tesis', 'articulos', 'proyectos', 'instituciones', 'subidasTotales'));
    }
}
