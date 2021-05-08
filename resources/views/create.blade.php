@extends('layouts.app')
@section('title')
    <title>Dodaj wpis</title>
@endsection

@section('content')
    <form method="POST" action="{{ url('/add') }}">
        @csrf
        <div class="row">
            <div class="col-4"></div>
            <div class="col-5">
                <h1 class="display-4">Dodaj wpis na blogu</h1>
            </div>
            <div class="col-3"></div>
        </div>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="form-group">
                    <label>Tytuł wpisu</label>
                    <input type="text" class="form-control" placeholder="Tytuł" required>
                </div>
                <div class="form-group">
                    <label>Treść wpisu</label>
                    <input type="text" class="form-control" placeholder="Treść" required>
                </div>
                <button type="submit" class="btn btn-primary">Zapisz</button>
            </div>
            <div class="col-2"></div>
        </div>
    </form>
@endsection