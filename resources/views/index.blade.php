@extends('layouts.app')

@section('title')
    <title>Strona głowna</title>
@endsection

@section('content')

<section class="py-5"><div class="container">
    <div class="row d-flex">
        <div class="col-12">
            <h3 class="mb-2 text-white text-center h2">Najnowsze wpisy</h3>
        </div>

        @foreach ($posts as $post)
            <div class="col-sm-6 col-md-4 mt-5  d-flex ">
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
                        <img class="card-img" src="https://images.unsplash.com/photo-1502726488490-f99c74217a37?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=d156ca94ceff848e0bd0c15894bebb5e" alt="">
                    </a>
                    <div class="card-body  ">
                        <p class="card-text">{{ $post->content }}</p>
                    </div>
                </article>
            </div>
        @endforeach

        

    </div>
</section>
@endsection
