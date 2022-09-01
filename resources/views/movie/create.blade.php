@extends('layouts.admin')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>{{$title}}</h3>
                <p class="text-subtitle text-muted">Let's Change the Movie</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/movie">Movie</a></li>
                        <li class="breadcrumb-item">Create</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Movie Form</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-horizontal" method="post" action="/movie">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="judul">Judul Movie :</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="tahun_rilis">Tahun Rilis :</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="number" class="form-control" name="tahun_rilis" placeholder="Tahun Rilis"  id="tahun_rilis">
                                </div>
                                <div class="col-md-4">
                                    <label for="rating">Rating :</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="number" step="0.01" class="form-control" placeholder="Rating"  name="rating" id="rating">
                                </div>
                                <div class="col-md-4">
                                    <label for="produser">Produser :</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" placeholder="Produser"  class="form-control" name="produser" id="produser">
                                </div>
                                <div class="col-md-4">
                                    <label>Genre</label>
                                </div>
                                <div class="col-md-8 form-group row">
                                    @foreach ($genres as $genre)
                                        <div class="form-check col-lg-6 mb-2">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="{{$genre->id}}" name="genre[]">
                                            <label class="form-check-label" for="inlineCheckbox1">{{$genre->nama}}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-sm-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Create</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection