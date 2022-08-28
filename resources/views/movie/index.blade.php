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
        <h1 class="text-center">Movie List</h1>
        <div class="card mt-4 mb-3">
            <div class="card-body">
                <table class="table table-borderless table-striped table-hover align-middle">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Rating</th>
                            <th scope="col">Produser</th>
                            <th scope="col">Genre</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($movies as $movie)
                        <tr>
                            <th scope="row">{{$movie->id}}</th>
                            <td>{{$movie->judul}}</td>
                            <td>{{$movie->rating}}</td>
                            <td>{{$movie->produser}}</td>
                            <td>
                                @foreach ($movie->genres as $genre)
                                    {{$genre->nama}},
                                @endforeach
                            </td>
                            <td class="d-flex">
                                <a href="/movie/{{$movie->id}}/edit" class="btn btn-warning m-1">Edit</a>
                                <form action="/movie/{{$movie->id}}" method="post" class="m-1">
                                    @csrf
                                    @method("delete")
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <th scope="row" colspan="5">Create Movie</th>
                        <td>
                            <a href="/movie/create" class="btn btn-success">Create</a>
                        </td>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {{$movies->links()}}
        </div>
    </section>
</body>
</html>