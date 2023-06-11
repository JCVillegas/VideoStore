<?php

namespace App\Http\Requests;

use App\Rules\ValidateMovieDuplicatedRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class MoviePostRequest extends FormRequest
{
    public function messages(): array
    {
        return [
            'title.required'   => 'Movie title is required'
        ];
    }
    public function rules(): array
    {
        return [
            'title'   => ['required', new ValidateMovieDuplicatedRule()]
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(
            [
                'success'   => false,
                'error'     => $validator->errors()
            ]
        ));
    }
}
