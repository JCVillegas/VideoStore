<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;
use Illuminate\Cache\CacheManager;
use Illuminate\Support\Facades\Cache;

class MovieService
{
    public const KEY_MOVIE_NUMBER  = 'movie_number_';
    public const KEY_MOVIE_COUNTER = 'movie_counter';

    // Public Methods
    public function createMovies($movieTitle): JsonResponse
    {

        $this->createMovie($movieTitle);
       // return $this->getTotalKeysInCache();

        return  response()->json(['success' => 'success', 200]);
    }


    // Public Methods

    private function createMovie($movieTitle): void
    {
        $movieKey = self::KEY_MOVIE_NUMBER . $this->getMovieCounter() + 1;
        if (! Cache::has($movieKey)) {
            $movieValue = [
                'title' => $movieTitle,
                'likes' => $movieTitle
            ];
            Cache::add($movieKey, $movieValue);
        }
    }
    private function getMovieCounter()
    {
        return Cache::get(self::KEY_MOVIE_COUNTER, 0);
    }


}
