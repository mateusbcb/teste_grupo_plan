<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EletrodomesticosController;

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
    // return view('welcome');
})->name('index');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    /**
     * Eletrodomésticos
     */
    //Listar
    Route::get('/eletrodomesticos', [EletrodomesticosController::class, 'index'])->name('eletrodomesticos');
    //Visualizar
    Route::get('/eletrodomestico/{id}', [EletrodomesticosController::class, 'show'])->name('eletrodomestico');
    //Criar
    Route::get('/novo_eletrodomestico', [EletrodomesticosController::class, 'create'])->name('eletrodomestico.novo');
    Route::post('/novo_eletrodomestico', [EletrodomesticosController::class, 'store'])->name('eletrodomestico.store');
    //Editar
    Route::get('/editar_eletrodomestico/{id}/edit', [EletrodomesticosController::class, 'edit'])->name('eletrodomestico.editar');
    Route::post('/editar_eletrodomestico/{id}', [EletrodomesticosController::class, 'update'])->name('eletrodomestico.salvar');
    //Deletar
    Route::delete('/deletar_eletrodomestico/{id}', [EletrodomesticosController::class, 'destroy'])->name('eletrodomestico.delete');
    // Filtro
    Route::get('/eletrodomestico/filtro/{marca_id}', [EletrodomesticosController::class, 'filter'])->name('eletrodomestico.filter');
});



// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
