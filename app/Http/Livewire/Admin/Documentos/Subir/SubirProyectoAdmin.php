<?php

namespace App\Http\Livewire\Admin\Documentos\Subir;

use App\Models\Docs;
use App\Models\DocsAutores;
use App\Models\Proyectos;
use Livewire\Component;
use Livewire\WithFileUploads;

class SubirProyectoAdmin extends Component
{


    use WithFileUploads;

    public $proyectoTitulo, $proyectoEncargado, $proyectoFinanciado, $proyectoFinanciamiento, $proyectoFechaInicio, $proyectoFechaFin, $proyectoDescripcion;




    public $doc;


    public function render()
    {
        return view('livewire.admin.documentos.subir.subir-proyecto-admin');
    }

    public function upload()
    {
        $user = auth()->user();

        // $this->validate();
        $name = uniqid() . '.pdf';
        $this->doc->storeAs('public/docs', $name);

        $newDoc = Docs::create([
            'tipo' => 'proyecto',
            'url' => $name,
            'idUsuario' => $user->id
        ]);

        Proyectos::create([
            'titulo' => $this->proyectoTitulo,
            'encargado' => $this->proyectoEncargado,
            'descripcion' => $this->proyectoDescripcion,
            'fechaInicio' => $this->proyectoFechaInicio,
            'fechaFin' => $this->proyectoFechaFin,
            'financiado' => 1,
            'financiamiento' => $this->proyectoFinanciamiento,
            'idDoc' => $newDoc->idDoc,
            'fechaSubida' => date('Y-m-d')
        ]);


        DocsAutores::create([
            'idDoc' => $newDoc->idDoc,
            'idAutor' => 268
        ]);

        $this->reset(['doc']);
    }
}
