@extends('layouts.app')

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

  <form action="{{ route('books.update', $book) }}" method="POST">
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
      <label>Judul</label>
      <input type="text" name="title" class="form-control" value="{{ $book->title }}" required>
    </div>

    <div class="mb-3">
      <label>Penulis</label>
      <input type="text" name="author" class="form-control" value="{{ $book->author }}" required>
    </div>

    <div class="mb-3">
      <label>Tahun Terbit</label>
      <input type="number" name="year" class="form-control" value="{{ $book->year }}" required>
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>
  </form>
</div>
@endsection