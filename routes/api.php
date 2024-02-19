<?php

use App\Http\Controllers\CitaController;
use App\Http\Controllers\PersonaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('store', [PersonaController::class, 'store']);
Route::get('search/medico', [PersonaController::class,'search']);
Route::post('CreateCitas', [CitaController::class, 'CreateCitas']);
Route::get('mostrarCitas', [CitaController::class, 'mostrarCitas']);
