<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Movie - Home</title>
</head>
<body>
    <nav class="navbar navbar-dark navbar-expand-lg bg-dark">
        <div class="container-xxl">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="/">Movie</a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/movie">Movie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/genre">Genre</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="container mt-4">
        <h1 class="text-center">Create movie</h1>
        <form action="/movie/{{$movie->id}}" method="post">
            @csrf
            @method("put")
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Movie :</label>
                <input type="text" class="form-control" name="judul" id="judul" value="{{$movie->judul}}" required>
            </div>
            <div class="mb-3">
                <label for="tahun_rilis" class="form-label">Tahun Rilis :</label>
                <input type="number" class="form-control" name="tahun_rilis" id="tahun_rilis" value="{{$movie->tahun_rilis}}">
            </div>
            <div class="mb-3">
                <label for="rating" class="form-label">Rating :</label>
                <input type="number" step="0.01" class="form-control" name="rating" id="rating" value="{{$movie->rating}}">
            </div>
            <div class="mb-3">
                <label for="produser" class="form-label">Produser :</label>
                <input type="text" class="form-control" name="produser" id="produser" value="{{$movie->produser}}">
            </div>
            <div class="row mb-3">
                <p class="form-label">Genre : </p>
                @foreach ($genres as $genre)
                    <div class="form-check col-lg-3">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="{{$genre->id}}" @if ($movie->genres->contains("id", $genre->id))
                            checked
                        @endif name="genre[]">
                        <label class="form-check-label" for="inlineCheckbox1">{{$genre->nama}}</label>
                    </div>
                @endforeach
            </div>
            <a href="/movie" class="btn btn-danger">Kembali</a>
            <button class="btn btn-success" type="submit">Create</button>
        </form>
    </section>
</body>
</html>