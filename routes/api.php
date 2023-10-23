<?php

use App\Http\Controllers\cargoController;
use App\Http\Controllers\trabajadorController;
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

//apis cargos
Route::get('/api/cargos', [cargoController::class, 'get']);
Route::post('/api/cargos', [cargoController::class, 'create']);
Route::put('/api/cargos/{id}', [cargoController::class, 'update']);
Route::delete('/api/cargos/{id}', [cargoController::class, 'delete']);

//apis trabajador
Route::get('/api/trabajador', [trabajadorController::class, 'get']);
Route::post('/api/trabajador', [trabajadorController::class, 'create']);
Route::put('/api/trabajador/{id}', [trabajadorController::class, 'update']);
Route::delete('/api/trabajador/{id}', [trabajadorController::class, 'delete']);


