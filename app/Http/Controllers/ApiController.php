<?php

namespace App\Http\Controllers;

use App\Http\Requests\MoviePostRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class ApiController extends Controller
{
    public function createMovie(Request $request): RedirectResponse
    {
        $name = $request->input('name');
    }
}
