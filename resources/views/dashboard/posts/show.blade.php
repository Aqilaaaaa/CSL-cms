@extends('dashboard.layouts.main')

@section('content-dashboard')
    <div class="container mt-2">
        <div class="row my-3">
            <div class="col-lg-8">
                <h2>{{ $post->title }}</h2>
                <a href="/dashboard/beritas" class="btn btn-success px-2 py-1"><span data-feather="arrow-left"
                        class="me-2"></span>Kembali</a>
                <a href="/dashboard/beritas/{{ $post->slug }}/edit" class="btn btn-warning px-2 py-1"><span data-feather="edit" class="me-2"></span>Edit</a>

             <form action="/dashboard/beritas/{{ $post->slug }}" method="post" class="d-inline" id="form1">
                    
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger px-2 py-1" id="btn-submit" onclick="return confirm('Yalin Ingin Menghapus?')" type="submit"><span
                            data-feather="x-circle" class="me-1"></span>Hapus</button>
                </form>

                @if ($post->image)
                <div style="max-height: 350px; overflow:hidden;">

                <img class="img-fluid mb-3 mt-3" src="{{asset('storage/' . $post->image) }}" alt="image {{ $post->category->name }}"
                    class="card-img-top" >
                
                </div>
                
                @else
                <img class="img-fluid mb-3 mt-3" src="https://source.unsplash.com/1200x400/?{{ $post->category->name }}"
                    class="card-img-top" alt="image">
                @endif
                
                <article class="mb-3 fs-5">
                    <!-- <p>{{ $post->excerpt }}</p> -->
                    {!! $post->body !!}
                </article>
            </div>
        </div>
    </div>
@endsection
