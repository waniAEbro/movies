@extends('layouts.admin')

@push('style')
<link rel="stylesheet" href="/extensions/simple-datatables/style.css">
<link rel="stylesheet" href="/css/pages/simple-datatables.css">
@endpush

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>{{$title}}</h3>
                <p class="text-subtitle text-muted">Welcome To My Dashboard</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4>Movie List</h4>
                <a href="/movie/create" class="btn btn-success">Create</a>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Judul</th>
                            <th scope="col" style="min-width: 100px">Rating</th>
                            <th scope="col">Produser</th>
                            <th scope="col">Genre</th>
                            <th scope="col">Action</th>
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
                </table>
            </div>
        </div>

    </section>
</div>
@endsection

@push('script')
<script src="/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="/js/pages/simple-datatables.js"></script>
@endpush