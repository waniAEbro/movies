<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;

class GenreController extends Controller
{
    public function index () {
        return view("genre.index", [
            "genres" => Genre::paginate(10)
        ]);
    }

    public function create() {
        return view("genre.create");
    }

    public function store(Request $request) {
        $request->validate([
            "nama" => [Rule::unique("genres")->withoutTrashed()]
        ]);

        Genre::create([
            "nama" => $request->nama
        ]);

        return redirect("/");
    }

    public function show (Genre $genre) {
        return view("genre.show", [
            "movies" => $genre->movies,
            "genre" => $genre
        ]);
    }

    public function edit (Genre $genre) {
        return view("genre.edit", [
            "genre" => $genre
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
