<?php

use App\Http\Controllers\DashboardController;
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
    return view('welcome');
})->name('index');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    //Listar
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //Visualizar
    Route::get('/eletrodomestico/{id}', [DashboardController::class, 'eletrodomestico'])->name('eletrodomestico');
    //Criar
    Route::get('/novo_eletrodomestico', [DashboardController::class, 'create'])->name('eletrodomestico.novo');
    Route::post('/novo_eletrodomestico', [DashboardController::class, 'store'])->name('eletrodomestico.store');
    //Editar
    Route::get('/editar_eletrodomestico/{id}', [DashboardController::class, 'edit'])->name('eletrodomestico.editar');
    Route::post('/editar_eletrodomestico', [DashboardController::class, 'edit_save'])->name('eletrodomestico.salvar');
    //Deletar
    Route::delete('/deletar_eletrodomestico/{id}', [DashboardController::class, 'delete'])->name('eletrodomestico.delete');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
