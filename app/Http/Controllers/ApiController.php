<?php

namespace App\Http\Controllers;

use App\Http\Requests\MoviePostLikeRequest;
use App\Http\Requests\MoviePostRequest;
use App\Services\MovieService;
use Illuminate\Http\JsonResponse;

class ApiController extends Controller
{
    public function addMovieLike(MoviePostLikeRequest $request): JsonResponse
    {
        (new MovieService())->addMovieLikes($request->movieId);

        return response()->json(
            [
                'success' => true,
                'message' => 'Movie like has been added.',
            ],
            200
        );
    }

    public function addMovie(MoviePostRequest $request): JsonResponse
    {
        (new MovieService())->addMovie($request->title);
        return response()->json(
            [
                'success' => true,
                'message' => 'Movie has been added.'
            ],
            200
        );
    }

    public function getMovies(): JsonResponse
    {
        $movies = (new MovieService())->getAllMovies();
        return response()->json(
            [
                'success' => true,
                'movies' => $movies
            ],
            200
        );
    }

    public function deleteMovies(): JsonResponse
    {
         (new MovieService())->deleteMovies();
        return response()->json(
            ['success' => true],
            200
        );
    }
}
