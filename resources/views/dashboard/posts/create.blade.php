@extends('dashboard.layouts.main')

@section('content-dashboard')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Upload Artikel Berita</h2>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/beritas" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
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
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select id="category" class="form-select @error('category_id') is-invalid @enderror" name="category_id">
                    @foreach ($categories as $category)
                        @if( old('category_id') == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
                    @error('category_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                     @enderror
                </div>

                <div class="mb-3">
                        <label for="image" class="form-label">Post Image</label>
                    <div>
                        <img src="" class="img-preview img-fluid mb-3 col-sm-5" id="frame" style="max-height: 500px; overflow:hidden">
                    </div>
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="preview()">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                
            <div class="mb-3">
                <input id="body" type="hidden" name="body" class="@error('body') is-invalid @enderror" value={{ old('body') }}>
                <trix-editor input="body"></trix-editor>
                @error('body')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Upload</button>
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

        document.addEventListener('trix-file-accept', (e) => e.preventDefault());


        function preview() {
            frame.src=URL.createObjectURL(event.target.files[0]);
        }


        
    </script>
@endsection
