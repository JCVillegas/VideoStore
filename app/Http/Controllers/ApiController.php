<?php

namespace App\Http\Controllers;

use App\Http\Requests\MoviePostLikeRequest;
use App\Http\Requests\MoviePostRequest;
use App\Services\MovieService;
use Illuminate\Http\JsonResponse;

class ApiController extends Controller
{
    public function addMovieLike($movieId): JsonResponse
    {
        (new MovieService())->addMovieLikes($movieId);

        return response()->json(['success' => 'success', 200]);
    }

    public function createMovie(MoviePostRequest $request): JsonResponse
    {
        return (new MovieService())->createMovies($request->title);
    }

    public function getMovies(): JsonResponse
    {
        $movies = (new MovieService())->getAllMovies();
        return response()->json(
            [['success' => 'success',
                'movies' => $movies], 200
            ]
        );
    }

    public function deleteMovies(): JsonResponse
    {
         (new MovieService())->deleteMovies();
        return response()->json(['success' => 'success', 200]);
    }
}
