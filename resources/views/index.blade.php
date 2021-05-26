@extends('layouts.app')

@section('title')
    <title>Strona głowna</title>
@endsection

@section('content')

<section class="py-5"><div class="container">
    <div class="row d-flex">
        <div class="col-12">
            <h1 class="display-5 bg-secondary text-white text-center ">Najnowsze wpisy</h1>
        </div>
        
        <input id="search" class="form-control mr-sm-2" type="search" placeholder="Szukaj (po tytule)" aria-label="Search">
        <p id="posts" >
            @foreach ($posts as $post)
                <div class="col-sm-6 col-md-4 mt-3  d-flex posts">
                    <article class="card mb-4 border-right-0 border-left-0 border-top-0 bg-dark text-white">
                        <header class="py-md-3 px-md-4">
                            <p class="mb-2">
                                <span class="">{{ $post->created_at }}</span>
                            </p>
                            <a href="#">
                                <h4 class="card-title text-white ">{{ $post->title }}</h4>
                            </a>
                        </header>
                        <a href="#">
                            <img class="card-img" src="{{ Storage::disk('google')->url($post->path_img) }}"  alt="{{ $post->title }}">
                        </a>
                        <div class="card-body  ">
                            <p class="card-text">{{ $post->content }}</p>
                        </div>
                    </article>
                </div>
            @endforeach
        </p>

    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    @if (session('status'))
        <script>

            Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Twój wpis został zapisany',
            showConfirmButton: false,
            timer: 2000
            })
        </script>
    @endif
    <div class="pagination pagination-lg pag ">
        {{ $posts->links() }}
    </div>
    <script src="{{ asset('js/search.js') }}"></script>
</section>
@endsection
