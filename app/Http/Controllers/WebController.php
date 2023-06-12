<?php

namespace App\Http\Controllers;

use App\Services\MovieService;
use Illuminate\Contracts\View\View;

class WebController extends Controller
{
    public function getMovies(): View
    {
        $movies = (new MovieService())->getAllMovies();
        return view('viewMovieCards', $movies);
    }
}
