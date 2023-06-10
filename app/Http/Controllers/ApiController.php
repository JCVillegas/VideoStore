<?php

namespace App\Http\Controllers;

use App\Http\Requests\MoviePostRequest;
use App\Services\MovieService;
use Illuminate\Http\JsonResponse;

class ApiController extends Controller
{
    public function createMovie(MoviePostRequest $request): JsonResponse
    {
        return (new MovieService())->createMovies($request->title);
    }
}
