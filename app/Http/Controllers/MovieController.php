<?php

namespace App\Http\Controllers;

use App\Movie;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
	{
		$moviesList = Movie::all();
                    return view('movies.list', ['movies' => $moviesList] );
	}

}
