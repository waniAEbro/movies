<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index () {
        return view ("index", [
            "movies" => Movie::orderBy("rating", "desc")->take(10)->get(),
            "genres" => Genre::get(),
            "title" => "Dashboard"
        ]);
    }
}
