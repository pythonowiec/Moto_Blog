@extends('layouts.app')
@section('title')
    <title>Dodaj wpis</title>
@endsection

@section('content')
    <form method="POST" action="{{ url('/add') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <h1 class="display-5 bg-secondary text-white text-center mt-3">Dodaj wpis na blogu</h1>
            </div>
            <div class="col-4"></div>
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
                            <input type="file" name="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Zapisz</button>
                    </div>
                </div>
                
            </div>
            <div class="col-2"></div>
        </div>
    </form>
@endsection