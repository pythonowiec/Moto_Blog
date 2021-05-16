@extends('layouts.app')

@section('title')
    <title>O blogu</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="card bg-secondary text-white mt-5">
                <div class="card-header">
                    O blogu
                </div>
                <div class="card-body">
                    <h5 class="card-title">Blog motoryzacyjny</h5>
                    <p class="card-text">Blog jest miejscem, w którym można zdobyć wiedzę o motoryzacji.</p>
                    <img src="{{ asset('img/maluch.jpg') }}" height="150" width="180" alt="Card image cap">
                </div>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
@endsection