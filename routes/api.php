<?php

use App\Http\Controllers\ApiController;
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

Route::post('movie', [ApiController::class, 'createMovie']);
Route::post('movie/{movieId}/likes', [ApiController::class, 'addMovieLike']);

Route::get('movies', [ApiController::class, 'getMovies']);
Route::delete('movies', [ApiController::class, 'deleteMovies']);
