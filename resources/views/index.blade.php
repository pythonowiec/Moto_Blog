@extends('layouts.app')

@section('title')
    <title>Strona głowna</title>
@endsection

@section('content')

<section class="py-5"><div class="container">
    <div class="row d-flex">
        <div class="jumbotron jumbotron-fluid bg-image  w-100 img-fluid"
        style="
          background-image: url({{asset('img/syrena.jpg')}});
          height: 65vh;">
        <h1 class="display-4 bg-dark text-white text-center" style="opacity: 0.50">Witaj, oto wszystkie wpisy</h1>
        </div>
        
        <input id="search" class="form-control mr-sm-2" type="search" placeholder="Szukaj (po tytule)" aria-label="Search">
        <div class="row row-cols-1 row-cols-md-3 g-4" id="posts">
            @foreach ($posts as $post)
                <div class="col mt-5">
                    <div class="card h-100 bg-secondary text-white ">
                        <img src="{{asset('img/syrena.jpg')}}" class="card-img-top" alt="{{ $post->title }}">
                        <div class="card-body">
                            <a class="text-white" href="{{ url('/', ['id' => $post->id]) }}"><h5 class="card-title">{{ $post->title }}</h5></a>
                            <p class="card-text">{{ $post->content }}</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-white">{{ $post->created_at }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


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
