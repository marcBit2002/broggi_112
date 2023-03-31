<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CartaController;
use App\Http\Controllers\Api\AgenciaController;
use App\Http\Controllers\Api\ComarcaController;
use App\Http\Controllers\Api\MunicipiController;
use App\Http\Controllers\Api\ExpedientController;
use App\Http\Controllers\Api\ProvinciaController;
use App\Http\Controllers\Api\IncidentController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('expedient', ExpedientController::class);
Route::apiResource('comarca', ComarcaController::class);
Route::apiResource('provincia', ProvinciaController::class);
Route::apiResource('municipi', MunicipiController::class);
Route::apiResource('carta', CartaController::class);
Route::apiResource('agencia', AgenciaController::class);
Route::apiResource('incident', IncidentController::class);
