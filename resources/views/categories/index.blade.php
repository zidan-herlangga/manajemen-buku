@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <h3><i class="bi bi-tags"></i> Daftar Kategori</h3>
  <a href="{{ route('categories.create') }}" class="btn btn-primary rounded-pill">
    <i class="bi bi-plus-circle"></i> Tambah Kategori
  </a>
</div>

@if (session('success'))
<div class="alert alert-success shadow-sm">{{ session('success') }}</div>
@endif

<div class="card shadow-sm">
  <div class="card-body">
    <table class="table table-hover align-middle">
      <thead class="table-light">
        <tr>
          <th>Nama Kategori</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($categories as $category)
        <tr>
          <td>{{ $category->name }}</td>
          <td>
            <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-warning rounded-pill">
              <i class="bi bi-pencil-square"></i>
            </a>
            <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline"
              onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
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
          <td colspan="2" class="text-center text-muted">Belum ada kategori.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection