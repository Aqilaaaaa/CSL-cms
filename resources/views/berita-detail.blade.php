@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">

            @if ($post->image)
                <div style="max-height: 350px; overflow:hidden;">

                <img class="img-fluid mb-3" src="{{asset('storage/' . $post->image) }}" alt="image {{ $post->category->name }}"
                    class="card-img-top" >
                
                </div>
                
            @else
                <img class="img-fluid mb-3" src="https://source.unsplash.com/1200x400/?{{ $post->category->name }}"
                    class="card-img-top" alt="image">
            @endif

                <h6>Writen By : <a class="text-decoration-none fw-bold"
                        href="/berita?author={{ $post->author->username }}">{{ $post->author->name }}</a> in <a
                        class="text-decoration-none badge bg-secondary"
                        href="/berita?category={{ $post->category->slug }}">{{ $post->category->name }}</a></h6>
                <article class="mb-3 fs-5">
                    <p>{{ $post->excerpt }}</p>
                    {!! $post->body !!}
                </article>
                <a class="text-decoration-none p-2" href="/berita">
                    <h6>Kembali ke Artikel</h6>
                </a>
            </div>
        </div>
    </div>
@endsection
