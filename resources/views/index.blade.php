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
        <div class="row row-cols-1 row-cols-md-3 g-4" id="posts">
            @foreach ($posts as $post)
                <div class="col mt-5">
                    <div class="card h-100 bg-secondary text-white ">
                        <img src="{{ Storage::disk('google')->url($post->path_img) }}" class="card-img-top" alt="{{ $post->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
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
