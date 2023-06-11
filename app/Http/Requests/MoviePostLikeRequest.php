<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class MoviePostLikeRequest extends FormRequest
{
    public function messages(): array
    {
        return [
            'movieId.required'   => 'Movie id is required'
        ];
    }
    public function rules(): array
    {
        return [
            'movieId' => 'required|integer'
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
