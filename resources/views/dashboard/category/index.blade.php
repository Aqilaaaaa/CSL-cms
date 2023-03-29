@extends('dashboard.layouts.main')

@section('content-dashboard')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>{{ $title }}</h2>
    </div>
    <div class="table-responsive col-lg-8">
        <a href="/dashboard/categories/create" class="btn btn-secondary mb-3"><span class="me-1" data-feather="file-plus"></span>
            Buat Kategori</a>
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success</strong> {{ session('success') }} ✅
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <table class="table table-hover table-sm">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_categories as $category)
                    <tr>
                        <td class="fw-bolder">{{ $loop->iteration }}</td>
                        <td>
                            <h6>{{ $category->name }}</h6>
                        </td>
                        
                        <td>
                            <a href="/dashboard/categories/{{ $category->slug }}/edit" class="badge bg-warning mb-1"><span data-feather="edit"></span></a>

                            <form action="/dashboard/categories/{{ $category->slug }}" method="post" class="d-inline" id="form1">
                                
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" id="btn-submit" onclick="return confirm('Yakin Ingin Menghapus?')" type="submit"><span
                                        data-feather="x-circle"></span></button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
