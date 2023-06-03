<?php

namespace App\Http\Livewire\Admin\Documentos\Subir;

use App\Models\Autores;
use App\Models\Docs;
use App\Models\DocsAutores;
use App\Models\Tesis;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Livewire\WithFileUploads;

class SubirTesisAdmin extends Component
{

    use WithFileUploads;

    public $tesisTitulo, $tesisAutorNombre = [], $tesisAutorApellido = [], $tesisAutorSexo = [], $tesisAsesor, $tesisAño, $tesisNivel, $tesisDepartamento, $tesisResumen;
    public $doc;
    public $cont = 0;

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
        $number = $this->cont;
        return view('livewire.admin.documentos.subir.subir-tesis-admin', compact('number'));
    }

    public function aumentar()
    {
        $this->cont++;
    }

    public function upload()
    {

        $user = auth()->user();

        // dd($user->id);


        $this->validate();
        $name = uniqid() . '.pdf';
        $this->doc->storeAs('public/docs/', $name);


        $newDoc = Docs::create([
            'tipo' => 'tesis',
            'url' => $name,
            'idUsuario' =>  $user->id,
        ]);

        for ($i = 0; $i < $this->cont; $i++) {

            $newAutor = Autores::create([
                'nombre' => $this->tesisAutorNombre[$i],
                'apellidos' => $this->tesisAutorApellido[$i],
                'sexo' => $this->tesisAutorSexo[$i],
            ]);

            DocsAutores::create([
                'idDoc' => $newDoc->idDoc,
                'idAutor' => $newAutor->idAutor,
            ]);
        }



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


        $this->reset(['doc']);

        $id = $newDoc->idDoc;
        $tipo = 2;

        return Redirect::route('vista-documento', compact('id', 'tipo'));
    }
}
