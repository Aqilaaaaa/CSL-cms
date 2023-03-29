@extends('dashboard.layouts.main')

@section('content-dashboard')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Upload Kategori</h2>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/categories" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="name" value="{{ old('title') }}" required>
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                    name="slug" required value="{{ old('slug') }}">
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-secondary">Simpan</button>
        </form>
    </div>

    <script>
        title = document.getElementById('title')
        slug = document.getElementById('slug')

        if (title) {
            title.addEventListener('change', function() {
                fetch('/dashboard/beritas/checkSlug?title=' + title.value)
                    .then((response) => response.json())
                    .then((data) => slug.value = data.slug)
            })
        }
        
    </script>

    
@endsection
