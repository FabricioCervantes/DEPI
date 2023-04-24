<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class DocsAdmin extends Component
{

    public $modal = false;
    public $title = "Subir";
    public $tesis;
    public $articulo;
    public $proyecto;


    public function render()
    {
        $titulo = $this->title;
        $tesis = $this->tesis;
        return view('livewire.admin.docs-admin', compact("titulo", "tesis"));
    }

    public function abrirModalSubir()
    {
        $this->modal = true;
        $this->title = "Subir documento";
        $this->tesis = 'subirTesisAdmin';
        $this->articulo = 'SubirArticuloAdmin';
        $this->proyecto = 'SubirProyectoAdmin';
    }

    public function abrirModalConsultar()
    {
        $this->modal = true;
        $this->title = "Consultar documento";
        $this->tesis = 'tesisAdmin';
        $this->articulo = 'articulosAdmin';
        $this->proyecto = 'proyectosAdmin';
    }

    public function cerrarModal()
    {
        $this->modal = false;
    }
}
