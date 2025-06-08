@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <h3><i class="bi bi-journal-text"></i> Daftar Buku</h3>
  <a href="{{ route('books.create') }}" class="btn btn-primary rounded-pill">
    <i class="bi bi-plus-circle"></i> Tambah Buku
  </a>
</div>

<form method="GET" action="{{ route('books.index') }}" class="row g-3 mb-4">
  <div class="col-md-5">
    <input type="text" name="search" value="{{ request('search') }}" class="form-control rounded-pill px-3"
      placeholder="Cari judul atau penulis...">
  </div>

  <div class="col-md-4">
    <select name="category_id" class="form-select rounded-pill px-3">
      <option value="">Semua Kategori</option>
      @foreach ($categories as $category)
      <option value="{{ $category->id }}" {{ request('category_id')==$category->id ? 'selected' : '' }}>
        {{ $category->name }}
      </option>
      @endforeach
    </select>
  </div>

  <div class="col-md-3 d-flex gap-2">
    <button class="btn btn-outline-secondary rounded-pill w-100">
      <i class="bi bi-search"></i> Cari
    </button>
    <a href="{{ route('books.index') }}" class="btn btn-outline-danger rounded-pill">
      <i class="bi bi-x-circle"></i>
    </a>
  </div>
</form>

@if (session('success'))
<div class="alert alert-success shadow-sm">{{ session('success') }}</div>
@endif

<div class="card shadow-sm">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-hover align-middle">
        <thead class="table-light">
          <tr>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Tahun</th>
            <th>Kategori</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($books as $book)
          <tr>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->year }}</td>
            <td>{{ $book->category->name }}</td>
            <td>
              <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-warning rounded-pill">
                <i class="bi bi-pencil-square"></i>
              </a>
              <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline"
                onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger rounded-pill">
                  <i class="bi bi-trash"></i>
                </button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="5" class="text-center text-muted">Tidak ada buku ditemukan.</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
    {{ $books->withQueryString()->links() }}
  </div>
</div>
@endsection