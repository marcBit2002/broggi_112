<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartaController;
use App\Http\Controllers\AgenciaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CartaSupController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\ExpedientController;
use App\Http\Controllers\InfoExpedientController;
use App\Http\Controllers\TipusIncidentController;
use App\Http\Controllers\InfoExpedientSupController;
use App\Http\Controllers\CartaTrucadaHasAgenciaController;

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
});

Route::get('/login', [UsuarioController::class, 'showLogin'])->name('login');
Route::post('/login', [UsuarioController::class, 'login']);
Route::get('/logout', [UsuarioController::class, 'logout']);

Route::get('stats', function () {
    return view('stats');
});

Route::middleware(['auth'])->group(function () {
    Route::get('menu', function () {
        return view('menu');
    });
    Route::get('carta', function () {
        return view('carta');
    });
});

Route::middleware(['auth', 'authAdmin'])->group(function () {
    Route::resource('admin/usuari', UsuarioController::class);
    Route::put('/admin/usuari/canviContrasenya/{usuari}', [UsuarioController::class, 'resetPasswd']);
    Route::resource('admin/agencies', AgenciaController::class);
    Route::resource('admin/incidents', IncidentController::class);
    Route::resource('admin/tipusIncidents', TipusIncidentController::class);
    Route::resource('admin/expedients', ExpedientController::class);
    Route::resource('admin/expedients/infoExpedient', InfoExpedientController::class);
    Route::resource('admin/expedients/infoExpedient/infoCarta', CartaTrucadaHasAgenciaController::class);
});

Route::middleware('auth', 'authSupervisor')->group(function () {
    Route::resource('expedients', ExpedientController::class);
    Route::resource('expedients/infoExpedient', InfoExpedientSupController::class);
    Route::resource('expedients/infoExpedient/infoCarta', CartaSupController::class);
});


Route::fallback(function () {
    return redirect('menu');
});
