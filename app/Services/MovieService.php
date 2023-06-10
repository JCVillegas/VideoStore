<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

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

    // Private Methods

    private function createMovie($movieTitle): JsonResponse
    {
        $this->incrementMovieCounter();
        $newMovieKey   = self::KEY_MOVIE_NUMBER . $this->getMovieCounter();
        $newMovieValue = [
            'title' => $movieTitle,
            'likes' => 0
        ];
        Cache::add($newMovieKey, $newMovieValue);
        return response()->json(['success' => 'success', 200]);
    }

    private function getAllMovies(): array
    {
        $movieCounter = $this->getMovieCounter();
        $movieArray   = range(0, $movieCounter - 1);
        foreach ($movieArray as $movieNumber) {
            $movieKey                  = self::KEY_MOVIE_NUMBER . $movieNumber + 1;
            $movie                     =  $this->getMovie($movieKey);
            $movieArray [$movieNumber] = $movie;
        }
        return $movieArray;
    }

    private function getMovie($movieKey): array
    {
        return Cache::get($movieKey, 0);
    }

    private function getMovieCounter(): int
    {
        return Cache::get(self::KEY_MOVIE_COUNTER, 0);
    }
    private function incrementMovieCounter(): void
    {
        Cache::increment(self::KEY_MOVIE_COUNTER);
    }
}
