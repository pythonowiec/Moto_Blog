@extends('layouts.app')

@section('title')
    <title>{{ $post->title ?? "" }}</title>
@endsection

@section('content')
    <section class="py-5"><div class="container">
        <div class="row">
            <img class="img-fluid" src="{{ Storage::disk('google')->url($post->path_img)  }}" alt="">
        </div>
        <div class="row">
            <div class="jumbotron jumbotron w-100 bg-secondary mt-3">
                <div class="container text-white">
                    <h1 class="display-4">{{$post->title}}</h1>
                    <p class="lead">{{$post->content}}</p>
                </div>
            </div>
        </div>
        
        <div class="row">
            <h1 class="display-5 text-white">Komentarze</h1>
            @foreach ($comments as $comment)
                    <div class="col-2"></div>
                    <div class="col-8 pt-5">
                        <div class="card bg-secondary text-white">
                            <div class="card-header">
                                {{ $comment->user }}
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ $comment->content }}</p>
                            </div>
                            <div class="card-footer">
                                {{ $comment->created_at }}
                            </div>
                          </div>
                    </div>
                    <div class="col-2"></div>
            @endforeach
        </div>
        @auth
            <div class="mt-4">
                <h1 class="display-5 text-white">Dodaj komentarz</h1>
                <form action="{{route('add_comment')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label text-white" required>Treść</label>
                        <input type="text" class="form-control" name="content" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <input type="hidden" name="id" value="{{ $post->id }}">
                    <button type="submit" class="btn btn-primary">Dodaj</button>
                </form>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        @else
        <div class="row mt-4">
            <h1 class="display-5 text-white">Zaloguj się aby dodać komentarz</h1>
        </div>
        @endauth

    </section>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('status'))
        <script>

            Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Twój komentarz został dodany',
            showConfirmButton: false,
            timer: 2000
            })
        </script>
    @endif
@endsection