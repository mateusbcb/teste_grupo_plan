<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EletrodomesticosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login',    [AuthController::class, 'login'])->name('auth.login');
Route::post('refresh',  [AuthController::class, 'refresh'])->name('auth.refesh');

Route::prefix('v1')->middleware('jwt.auth')->group(function () {
    Route::post('me',       [AuthController::class, 'me'])->name('auth.me');
    Route::post('logout',   [AuthController::class, 'logout'])->name('auth.logout');

    Route::resource('/eletrodomesticos', EletrodomesticosController::class);
});

// Route::middleware('auth:sanctum')->prefix('/v1')->group( function () {
//     Route::resource('/eletrodomesticos', DashboardController::class);
// });
