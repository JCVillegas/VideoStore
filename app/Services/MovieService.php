<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;
use Illuminate\Cache\CacheManager;
use Illuminate\Support\Facades\Cache;

use function PHPUnit\Framework\throwException;

class MovieService
{
    public const KEY_MOVIE_NUMBER  = 'movieNumber_';
    public const KEY_MOVIE_COUNTER = 'movieCounter';

    // Public Methods
    public function createMovies($movieTitle): JsonResponse
    {
        //todo validate movieTitle.
        return $this->createMovie($movieTitle);
    }

    private function incrementMovieCounter(): void
    {
        Cache::increment(self::KEY_MOVIE_COUNTER);
    }

    private function getMovieCounter(): int
    {
        return Cache::get(self::KEY_MOVIE_COUNTER, 0);
    }

    // Private Methods

    private function createMovie($movieTitle): JsonResponse
    {
        $this->incrementMovieCounter();
        $newMovieKey = self::KEY_MOVIE_NUMBER . $this->getMovieCounter();
        $newMovieValue = [
                'title' => $movieTitle,
                'likes' => 0
        ];
        Cache::add($newMovieKey, $newMovieValue);
        return response()->json(['success' => 'success', 200]);
    }
}
