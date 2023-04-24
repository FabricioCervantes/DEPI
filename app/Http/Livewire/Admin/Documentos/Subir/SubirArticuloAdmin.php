<?php

namespace App\Http\Livewire\Admin\Documentos\Subir;

use App\Models\Artículos;
use App\Models\Autores;
use App\Models\Docs;
use App\Models\DocsAutores;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Livewire\WithFileUploads;

class SubirArticuloAdmin extends Component
{
    use WithFileUploads;


    public $articuloTitulo, $articuloAutorNombre = [], $articuloAutorApellido = [], $articuloAutorSexo = [], $articuloRevista, $articuloVolumen, $articuloFecha, $articuloAbstract;

    public $doc;
    public $cont = 0;

    protected $rules = [
        'articuloTitulo' => 'required',
        'articuloAutorNombre' => 'required',
        'articuloAutorApellido' => 'required',
        'articuloAutorSexo' => 'required',
        'articuloRevista' => 'required',
        'articuloVolumen' => 'required',
        'articuloFecha' => 'required',
        'articuloAbstract' => 'required',
        'doc' => 'required'
    ];




    public function render()
    {

        $number = $this->cont;
        return view('livewire.admin.documentos.subir.subir-articulo-admin', compact('number'));
    }

    public function aumentar()
    {
        $this->cont++;
    }


    public function upload()
    {
        // $this->validate();




        $name = uniqid() . '.pdf';
        $this->doc->storeAs('public/docs/', $name);
        $newDoc = Docs::create([
            'tipo' => 'articulo',
            'url' => $name,
            'idUsuario' => 32
        ]);

        for ($i = 0; $i < $this->cont; $i++) {

            $newAutor = Autores::create([
                'nombre' => $this->articuloAutorNombre[$i],
                'apellidos' => $this->articuloAutorApellido[$i],
                'sexo' => $this->articuloAutorSexo[$i],
            ]);

            DocsAutores::create([
                'idDoc' => $newDoc->idDoc,
                'idAutor' => $newAutor->idAutor,
            ]);
        }

        Artículos::create([
            'titulo' => $this->articuloTitulo,
            'revista' => $this->articuloRevista,
            'volumen' => $this->articuloVolumen,
            'fecha' => $this->articuloFecha,
            'abstract' => $this->articuloAbstract,
            'idDoc' => $newDoc->idDoc,
            'fechaSubida' => date('Y-m-d')
        ]);



        $this->reset(['doc']);

        $id = $newDoc->idDoc;
        $tipo = 1;

        return Redirect::route('vista-documento', compact('id', 'tipo'));
    }
}
