<?php

namespace App\Http\Livewire\Admin\Documentos\Subir;

use App\Models\Docs;
use App\Models\DocsAutores;
use App\Models\Tesis;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Livewire\WithFileUploads;

class SubirTesisAdmin extends Component
{

    use WithFileUploads;

    public $tesisTitulo, $tesisAutores, $tesisAsesor, $tesisAño, $tesisNivel, $tesisDepartamento, $tesisResumen;
    public $doc;

    protected $rules = [
        'tesisTitulo' => 'required',
        // 'tesisAutores' => 'required',
        'tesisAsesor' => 'required',
        'tesisAño' => 'required',
        'tesisNivel' => 'required',
        'tesisDepartamento' => 'required',
        'tesisResumen' => 'required',
        'doc' => 'required'
    ];

    public function render()
    {
        return view('livewire.admin.documentos.subir.subir-tesis-admin');
    }

    public function upload()
    {

        $this->validate();
        $name = uniqid() . '.pdf';
        $this->doc->storeAs('public/docs/', $name);


        $newDoc = Docs::create([
            'tipo' => 'tesis',
            'url' => $name,
            'idUsuario' => 101
        ]);


        Tesis::create([
            'titulo' => $this->tesisTitulo,
            'asesor' => $this->tesisAsesor,
            'fecha' => $this->tesisAño,
            'nivel' => $this->tesisNivel,
            'departamento' => $this->tesisDepartamento,
            'abstract' => $this->tesisResumen,
            'idDoc' => $newDoc->idDoc,
            'fechaSubida' => date('Y-m-d')
        ]);

        DocsAutores::create([
            'idDoc' => $newDoc->idDoc,
            'idAutor' => 268
        ]);

        $this->reset(['doc']);

        $id = $newDoc->idDoc;
        $tipo = 2;

        return Redirect::route('vista-documento', compact('id', 'tipo'));
    }
}
