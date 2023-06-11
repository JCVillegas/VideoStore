<?php

namespace App\Rules;

use App\Services\MovieService;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class ValidateMovieDuplicatedRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $movies = (new MovieService())->getAllMovies($value);
        foreach ($movies as $movieKey => $movieValue) {
            if ($value === $movieValue['title']) {
                 $fail('Movie title is duplicated.');
                 break;
            }
        }
    }
}
