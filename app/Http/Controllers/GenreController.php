<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\Movie;

class GenreController extends Controller
{
    public function index () {
        return view("genre.index", [
            "genres" => Genre::get(),
            "title" => "Genre"
        ]);
    }

    public function create() {
        return view("genre.create", [
            "title" => "Genre"
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            "nama" => [Rule::unique("genres")->withoutTrashed()]
        ]);

        Genre::create([
            "nama" => $request->nama
        ]);

        return redirect("/genre");
    }

    public function show (Genre $genre) {
        return view("genre.show", [
            "movies" => Movie::select("movies.*")
                ->join("genre_movie", "genre_movie.movie_id", "=", "movies.id")
                ->where("genre_movie.genre_id", $genre->id)
                ->get(),
            "genre" => $genre,
            "title" => "Genre"
        ]);
    }

    public function edit (Genre $genre) {
        return view("genre.edit", [
            "genre" => $genre,
            "title" => "Genre"
        ]);
    }

    public function update (Request $request, Genre $genre) {
        if ($request->nama != $genre->nama) {
            $request->validate([
                "nama" => [Rule::unique("genres")->withoutTrashed()]
            ]);
        }

        $genre->update([
            "nama" => $request->nama
        ]);
        return redirect("/genre");
    }

    public function destroy (Genre $genre) {
        $genre->delete();
        return redirect("/genre");
    }
}
