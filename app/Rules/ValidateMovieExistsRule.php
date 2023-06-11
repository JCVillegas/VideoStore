<?php

namespace App\Rules;

use App\Services\MovieService;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class ValidateMovieExistsRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $movieKey     = MovieService::KEY_MOVIE_NUMBER . $value;
        $moviesExists = (new MovieService())->getMovie($movieKey);
        if (!$moviesExists) {
                 $fail('Movie id does not exist.');
        }
    }
}
