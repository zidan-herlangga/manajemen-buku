@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')
    <div class="container">
        <h2>Edit Buku</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Error!</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('books.update', $book) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Kategori</label>
                <select name="category_id" class="form-select" required>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}" {{ $book->category_id == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="title">Judul</label>
                <input type="text" name="title" class="form-control" value="{{ $book->title }}" required>
            </div>

            <div class="mb-3">
                <label for="publisher">Penerbit</label>
                <input type="text" name="publisher" class="form-control" value="{{ $book->publisher }}" required>
            </div>

            <div class="mb-3">
                <label for="author">Penulis</label>
                <input type="text" name="author" class="form-control" value="{{ $book->author }}" required>
            </div>

            <div class="mb-3">
                <label for="year">Tahun Terbit</label>
                <input type="number" name="year" class="form-control" value="{{ $book->year }}" required>
            </div>

            <div class="mb-3">
                <label for="cover" class="form-label">Cover Buku</label>
                <input type="file" name="cover" class="form-control">
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
