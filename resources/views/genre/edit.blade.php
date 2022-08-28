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
        <h1 class="text-center">Create Genre</h1>
        <form action="/genre/{{$genre->id}}" method="post">
            @csrf
            @method("put")
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Genre :</label>
                <input type="text" class="form-control @error("nama") is-invalid @enderror" value="{{$genre->nama}}" name="nama" id="nama" required>
            </div>
            @error('nama')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <a href="/genre" class="btn btn-danger">Kembali</a>
            <button class="btn btn-success" type="submit">Edit</button>
        </form>
    </section>
</body>
</html>