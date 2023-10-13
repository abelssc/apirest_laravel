<?php

use App\Http\Controllers\NoteController;
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
// resource- usadas generalmente para rutas de api
Route::resource("/note",NoteController::class);

// Por defecto laravel proteje la peticion de las rutas a travez de un middleware, por el momento obiaremos esto 
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
