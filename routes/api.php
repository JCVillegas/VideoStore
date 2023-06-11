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

Route::controller(ApiController::class)->group(function () {
    Route::post('movie/{movieId}/likes', 'addMovieLike');
    Route::post('movie', 'createMovie');
    Route::get('movies', 'getMovies');
    Route::delete('movies', 'deleteMovies');
});
