@extends('layouts.admin')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>{{$title}}</h3>
                <p class="text-subtitle text-muted">Let's Change the Genre</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/genre">Genre</a></li>
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
                <h4 class="card-title">Genre Form</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-horizontal" method="post" action="/genre">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="nama">Nama Genre :</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" class="form-control @error("nama") is-invalid @enderror" name="nama" id="nama" placeholder="Nama Genre" required>
                                </div>
                                @error('nama')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
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