@extends('layouts.app')
@section('title')
    <title>Dodaj wpis</title>
@endsection

@section('content')
<section class="py-5"><div class="container">
    <form method="POST" action="{{ url('/add') }}" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="jumbotron jumbotron-fluid bg-image  w-100 img-fluid"
                style="
                    background-image: url({{asset('img/syrena.jpg')}});
                    height: 65vh;">
                <h1 class="display-4 bg-dark text-white text-center" style="opacity: 0.50">Dodaj nowy wpis</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="card bg-secondary text-white">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Tytuł wpisu</label>
                            <input type="text" name="title" class="form-control" placeholder="Tytuł" required>
                        </div>
                        <div class="form-group">
                            <label>Treść wpisu</label>
                            <textarea type="text" name="content" class="form-control" placeholder="Treść" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Zdjęcie</label>
                            <input type="file" name="image" >
                        </div>
                        <button type="submit" class="btn btn-primary">Zapisz</button>
                    </div>
                </div>
                
            </div>
            <div class="col-2"></div>
        </div>
    </form>
    @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
</section>
@endsection