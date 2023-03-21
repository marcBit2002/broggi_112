<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgenciaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ExpedientController;

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


Route::get('carta', function () {
    return view('carta');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/menu', function () {
        return view('menu');
    });
});

Route::middleware(['auth', 'authAdmin'])->group(function () {
    Route::resource('admin/usuari', UsuarioController::class);
    Route::resource('admin/agencies', AgenciaController::class);
    Route::resource('/admin/expedients', ExpedientController::class);
});


Route::fallback(function () {
    return redirect('/menu');
});
