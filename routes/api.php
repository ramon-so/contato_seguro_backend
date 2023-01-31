<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\RelatosController;



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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('usuarios', [UsuariosController::class, 'read']);
Route::post('usuarios', [UsuariosController::class, 'create']);
Route::put('usuarios/{id}', [UsuariosController::class, 'update']);
Route::delete('usuarios/{id}', [UsuariosController::class, 'delete']);

Route::get('empresas', [EmpresasController::class, 'read']);
Route::post('empresas', [EmpresasController::class, 'create']);
Route::put('empresas/{id}', [EmpresasController::class, 'update']);
Route::delete('empresas/{id}', [EmpresasController::class, 'delete']);

Route::get('relatos', [RelatosController::class, 'read']);
Route::post('relatos', [RelatosController::class, 'create']);
Route::put('relatos/{id}', [RelatosController::class, 'update']);
Route::delete('relatos/{id}', [RelatosController::class, 'delete']);