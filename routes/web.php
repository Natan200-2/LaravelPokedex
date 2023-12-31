<?php

use App\Http\Controllers\PokeAPIController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PokeAPIController::class,'index']);

Route::get('/pokemon/{id}', [PokeAPIController::class,'show']);