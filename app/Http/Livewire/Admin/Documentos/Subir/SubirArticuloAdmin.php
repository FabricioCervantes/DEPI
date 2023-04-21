<?php

namespace App\Http\Livewire\Admin\Documentos\Subir;

use App\Models\Artículos;
use App\Models\Docs;
use App\Models\DocsAutores;
use Livewire\Component;
use Livewire\WithFileUploads;

class SubirArticuloAdmin extends Component
{
    use WithFileUploads;


    public $articuloTitulo, $articuloAutores, $articuloRevista, $articuloVolumen, $articuloFecha, $articuloAbstract;

    public $doc;

    public function render()
    {
        return view('livewire.admin.documentos.subir.subir-articulo-admin');
    }

    public function upload()
    {
        // $this->validate();
        $name = uniqid() . '.pdf';
        $this->doc->storeAs('public/docs', $name);

        $newDoc = Docs::create([
            'tipo' => 'articulo',
            'url' => $name,
            'idUsuario' => 32
        ]);

        Artículos::create([
            'titulo' => $this->articuloTitulo,
            'revista' => $this->articuloRevista,
            'volumen' => $this->articuloVolumen,
            'fecha' => $this->articuloFecha,
            'abstract' => $this->articuloAbstract,
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