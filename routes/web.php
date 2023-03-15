<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

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

// Route::get('/', function () {
//     return view('menu');
// });
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [UsuarioController::class, 'showLogin'])->name('login');
Route::post('/login', [UsuarioController::class, 'login']);
Route::get('/logout', [UsuarioController::class, 'logout']);

Route::resource('usuari', UsuarioController::class);


Route::middleware(['auth'])->group(function () {
    Route::get('/menu', function () {
        return view('menu');
    });
});

Route::middleware(['auth', 'authAdmin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin');
    });
});


Route::fallback(function () {
    return redirect('/menu');
});
