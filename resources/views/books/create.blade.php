@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
  <div class="card-body">
    <h4 class="mb-4">Tambah Buku Baru</h4>

    @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
        <li>⚠️ {{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <form action="{{ route('books.store') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="title" class="form-label">Judul Buku</label>
        <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
      </div>
      <div class="mb-3">
        <label for="author" class="form-label">Penulis</label>
        <input type="text" name="author" class="form-control" value="{{ old('author') }}" required>
      </div>
      <div class="mb-3">
        <label for="year" class="form-label">Tahun Terbit</label>
        <input type="number" name="year" class="form-control" value="{{ old('year') }}" required>
      </div>
      <div class="mb-3">
        <label for="category_id" class="form-label">Kategori</label>
        <select name="category_id" class="form-select" required>
          <option value="">Pilih Kategori</option>
          @foreach ($categories as $category)
          <option value="{{ $category->id }}" {{ old('category_id')==$category->id ? 'selected' : '' }}>
            {{ $category->name }}
          </option>
          @endforeach
        </select>
      </div>
      <button type="submit" class="btn btn-success rounded-pill">Simpan</button>
      <a href="{{ route('books.index') }}" class="btn btn-secondary rounded-pill">Kembali</a>
    </form>
  </div>
</div>
@endsection