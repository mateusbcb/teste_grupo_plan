<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    //Listar
    Route::get('/eletrodomesticos', [DashboardController::class, 'index'])->name('eletrodomesticos');
    //Visualizar
    Route::get('/eletrodomestico/{id}', [DashboardController::class, 'show'])->name('eletrodomestico');
    //Criar
    Route::get('/novo_eletrodomestico', [DashboardController::class, 'create'])->name('eletrodomestico.novo');
    Route::post('/novo_eletrodomestico', [DashboardController::class, 'store'])->name('eletrodomestico.store');
    //Editar
    Route::get('/editar_eletrodomestico/{id}', [DashboardController::class, 'edit'])->name('eletrodomestico.editar');
    Route::post('/editar_eletrodomestico', [DashboardController::class, 'update'])->name('eletrodomestico.salvar');
    //Deletar
    Route::delete('/deletar_eletrodomestico/{id}', [DashboardController::class, 'destroy'])->name('eletrodomestico.delete');
    // Filtro
    Route::get('/eletrodomestico/filtro/{marca_id}', [DashboardController::class, 'filter'])->name('eletrodomestico.filter');
});



// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
