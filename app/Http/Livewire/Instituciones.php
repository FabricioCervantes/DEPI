<?php

namespace App\Http\Livewire;

use App\Models\Instituciones as ModelsInstituciones;
use Livewire\Component;

class Instituciones extends Component
{
    public $modalAgregar = false;

    public $title;

    protected $rules = [
        'title' => 'required'
    ];

    protected $listeners = ['render', 'borrar'];

   

    public function render()
    {
        $instituciones = ModelsInstituciones::all();
        return view('livewire.admin.instituciones', compact('instituciones'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function borrar(ModelsInstituciones $ins)
    {
        $ins->delete();
    }

    public function agregar()
    {
        $this->modalAgregar = true;
    }
    public function agregarCerrar()
    {
        $this->modalAgregar = false;
    }

    public function añadirInstitucion()
    {

        $this->validate();
        ModelsInstituciones::create([
            'nombre' => $this->title
        ]);
        $this->agregarCerrar();
        $this->title = '';
    }
}