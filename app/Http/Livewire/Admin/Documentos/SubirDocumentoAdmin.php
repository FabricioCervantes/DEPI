<?php

namespace App\Http\Livewire\Admin\Documentos;

use App\Models\Artículos;
use App\Models\Autores;
use App\Models\Docs;
use App\Models\DocsAutores;
use App\Models\Tesis;
use Livewire\Component;
use Livewire\WithFileUploads;

class SubirDocumentoAdmin extends Component
{

    use WithFileUploads;

    public $tesisTitulo, $tesisAutores, $tesisAsesor, $tesisAño, $tesisNivel, $tesisDepartamento, $tesisResumen;

    public $articuloTitulo, $articuloAutores, $articuloRevista, $articuloVolumen, $articuloFecha, $articuloAbstract;


    public $tesis, $articulo, $proyecto;

    protected $rules = [
        'tesisTitulo' => 'required',
        // 'tesisAutores' => 'required',
        'tesisAsesor' => 'required',
        'tesisAño' => 'required',
        'tesisNivel' => 'required',
        'tesisDepartamento' => 'required',
        'tesisResumen' => 'required'
    ];
    public function render()
    {
        $autores = Autores::select('autores.nombre', 'autores.apellidos', 'autores.idAutor')
            ->groupBy('autores.nombre')
            ->get();

        return view('livewire.admin.documentos.subir-documento-admin', compact('autores'));
    }

    public function subirTesis()
    {

        $this->validate();
        $name = uniqid() . '.pdf';
        $this->tesis->storeAs('public/docs', $name);


        $newDoc = Docs::create([
            'tipo' => 'tesis',
            'url' => $name,
            'idUsuario' => 32
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
    }

    public function subirArticulo()
    {
        // $this->validate();
        $name = uniqid() . '.pdf';
        $this->articulo->storeAs('public/docs', $name);

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