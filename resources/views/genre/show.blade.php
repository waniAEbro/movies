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
    <section class="container mb-3 mt-4">
        <h1 class="text-center">List Movie Genre {{$genre->nama}}</h1>
        <div class="card mt-4">
            <div class="card-body">
                <table class="table table-borderless table-striped table-hover align-middle">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Rating</th>
                            <th scope="col">Produser</th>
                            <th scope="col">Genre</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($movies as $number => $movie)    
                        <tr>
                            <th scope="row">{{$number + 1}}</th>
                            <td>{{$movie->judul}}</td>
                            <td>{{$movie->rating}}</td>
                            <td>{{$movie->produser}}</td>
                            <td>
                                @foreach ($movie->genres as $genre)
                                    {{$genre->nama}},
                                @endforeach
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{$movies->links()}}
                </div>
            </div>
        </div>
    </section>
</body>
</html>