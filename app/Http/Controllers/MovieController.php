<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    public function index () {
        return view("movie.index", [
            "movies" => Movie::get(),
            "title" => "Movie"
        ]);
    }

    public function create () {
        return view("movie.create", [
            "genres" => Genre::get(),
            "title" => "Movie"
        ]);
    }

    public function store (Request $request) {
        $movie = Movie::create([
            "judul" => $request->judul,
            "tahun_rilis" => $request->tahun_rilis,
            "rating" => floatval($request->rating),
            "produser" => $request->produser
        ]);

        if ($request->genre != null) {
            foreach($request->genre as $genre) {
                DB::table("genre_movie")->insert([
                    "movie_id" => $movie->id,
                    "genre_id" => $genre
                ]);
            }
        }
        
        return redirect("/movie");
    }

    public function edit (Movie $movie) {
        return view("movie.edit", [
            "movie" => $movie,
            "genres" => Genre::get(),
            "title" => "Movie"
        ]);
    }

    public function update (Request $request, Movie $movie) {
        DB::table("genre_movie")->where("movie_id", $movie->id)->delete();

        $movie->update([
            "judul" => $request->judul,
            "tahun_rilis" => $request->tahun_rilis,
            "rating" => floatval($request->rating),
            "produser" => $request->produser
        ]);

        if ($request->genre != null) {
            foreach($request->genre as $genre) {
                DB::table("genre_movie")->insert([
                    "movie_id" => $movie->id,
                    "genre_id" => $genre
                ]);
            }
        }

        return redirect("/movie");
    }

    public function destroy (Movie $movie) {
        $movie->delete();
        return redirect("/movie");
    }
}
