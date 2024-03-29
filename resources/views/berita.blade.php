@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center mb-3">
            <div class="col-lg-6">
                <form action="/berita" class="d-flex w-100">

                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif

                    @if (request('author'))
                        <input type="hidden" name="author" value="{{ request('author') }}">
                    @endif

                    <input class="form-control me-2" name="search" type="text" placeholder="Search"
                        aria-label="Search" value="{{ request('search') }}">
                    <input type="submit" value="Search" class="btn btn-outline-success">
                </form>
            </div>
        </div>
        @if ($berita->count())
            
                
                        <div class="card mb-3 ">

                            @if ($berita[0]->image)
                            <div style="max-height: 400; overflow:hidden;">

                            <img src="{{asset('storage/' . $berita[0]->image) }}" alt="{{ $berita[0]->category->name }}"
                                class="img-fluid w-100" >
                            
                            </div>
                            
                            @else
                            <img src="https://source.unsplash.com/1200x400/?{{ $berita[0]->category->name }}"
                                class="card-img-top" alt="{{$berita[0]->category->name}}">
                            @endif

                        
                        <div class="card-body">
                            <a href="/berita/{{ $berita[0]->slug }}" class="text-decoration-none text-dark">
                                <h3 class="card-title fw-bolder">{{ $berita[0]->title }}</h3>
                            </a>
                            <h6>Writen By :
                                <a class="text-decoration-none fw-bolder"
                                    href="/berita?author={{ $berita[0]->author->username }}">{{ $berita[0]->author->name }}</a>
                                in
                                <a class="text-decoration-none badge bg-secondary"
                                    href="/berita?category={{ $berita[0]->category->slug }}">{{ $berita[0]->category->name }}</a>
                                <span class="text-muted">{{ $berita[0]->created_at->diffForHumans() }}</span>
                            </h6>
                            <p class="card-text">{{ $berita[0]->excerpt }}</p>
                            <a href="/berita/{{ $berita[0]->slug }}" class="text-decoration-none btn btn-secondary">Read
                                More</a>
                        </div>
                    </div>
               

            <div class="row">
                @foreach ($berita->skip(1) as $post)
                    <div class="col-lg-4">
                        <div class="card mb-3">

                        @if ($post->image)
                            <img class="img-fluid mb-3" src="{{asset('storage/' . $post->image) }}" alt="image {{ $post->category->name }}"
                                class="card-img-top" >
                            
                        @else
                            <img src="https://source.unsplash.com/500x400/?{{ $post->category->name }}"
                                class="card-img-top" alt="img-source">
                        @endif

                            <div class="position-absolute px-3 py-2 bg-trans"><a
                                    class="text-white text-decoration-none fw-bold"
                                    href="/berita?category={{ $post->category->slug }}">{{ $post->category->name }}</a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title fw-bolder"><a class="text-decoration-none text-dark"
                                        href="/berita/{{ $post->slug }}">{{ $post->title }}</a></h5>
                                <h6>Writen By :
                                    <a class="text-decoration-none fw-bolder"
                                        href="/berita?author={{ $post->author->username }}">{{ $post->author->name }}</a>
                                    <span class="text-muted">{{ $post->created_at->diffForHumans() }}</span>
                                </h6>
                                <p class="card-text">{{ $post->excerpt }}</p>
                                <a href="/berita/{{ $post->slug }}" class="btn btn-secondary">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="row justify-content-center">
                <div class="alert alert-info text-center fw-bold w-75" role="alert">
                    Artikel yang anda cari tidak ditemukan.. <a class="text-decoration-none" href="/berita">kembali</a>
                </div>
            </div>
        @endif

        {{ $berita->links() }}
        <a class="text-decoration-none badge bg-secondary fs-6" href="/categories">Lihat Semua Kategori</a><br>
    </div>
@endsection
