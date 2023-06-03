<?php

use App\Http\Livewire\Admin\DocsAdmin;
use App\Http\Livewire\Admin\Documentos\ArticulosAdmin;
use App\Http\Livewire\Admin\Documentos\ProyectosAdmin;
use App\Http\Livewire\Admin\Documentos\Subir\SubirArticuloAdmin;
use App\Http\Livewire\Admin\Documentos\Subir\SubirProyectoAdmin;
use App\Http\Livewire\Admin\Documentos\Subir\SubirTesisAdmin;
use App\Http\Livewire\Admin\Documentos\SubirDocumentoAdmin;
use App\Http\Livewire\Admin\Documentos\TesisAdmin;
use App\Http\Livewire\Administracion;
use App\Http\Livewire\Aliados;
use App\Http\Livewire\Articulos;
use App\Http\Livewire\Contacto;
use App\Http\Livewire\Documentos;
use App\Http\Livewire\Estadisticas;
use App\Http\Livewire\GestionUsuarios;
use App\Http\Livewire\Instituciones;
use App\Http\Livewire\Proyectos;
use App\Http\Livewire\Tesis;
use App\Http\Livewire\VistaDocumento;
use App\Models\Artículos;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/articulos', Articulos::class)->name('articulos');
Route::get('/documentos', Documentos::class)->name('documentos');
Route::get('/tesis', Tesis::class)->name('tesis');
Route::get('/proyectos', Proyectos::class)->name('proyectos');
Route::get('/vista-documento', VistaDocumento::class)->name('vista-documento');
Route::get('/contacto', Contacto::class)->name('contacto');
Route::get('/estadisticas', Estadisticas::class)->name('estadisticas');
Route::get('/aliados', Aliados::class)->name('aliados');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/gestion-usuarios', GestionUsuarios::class)->name('GestionUsuarios');
    Route::get('/instituciones', Instituciones::class)->name('instituciones');
    Route::get('/docsAdmin', DocsAdmin::class)->name('docs');
    Route::get('/tesisAdmin', TesisAdmin::class)->name('tesisAdmin');
    Route::get('/articulosAdmin', ArticulosAdmin::class)->name('articulosAdmin');
    Route::get('/proyectosAdmin', ProyectosAdmin::class)->name('proyectosAdmin');
    Route::get('/subirDocumentoAdmin', SubirDocumentoAdmin::class)->name('subirDocumentoAdmin');
    Route::get('/subirTesisAdmin', SubirTesisAdmin::class)->name('subirTesisAdmin');
    Route::get('/subirArticuloAdmin', SubirArticuloAdmin::class)->name('SubirArticuloAdmin');
    Route::get('/SubirProyectoAdmin', SubirProyectoAdmin::class)->name('SubirProyectoAdmin');
});

Route::group(['middleware' => ['role:Admin']], function () {
    Route::get('/administracion', Administracion::class)->name('administracion');
    Route::get('/gestion-usuarios', GestionUsuarios::class)->name('GestionUsuarios');
    Route::get('/instituciones', Instituciones::class)->name('instituciones');
});
