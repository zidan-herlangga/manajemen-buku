@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
  <div class="card-body">
    <h4 class="mb-4">Tambah Kategori Baru</h4>

    @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
        <li>⚠️ {{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <form action="{{ route('categories.store') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Nama Kategori</label>
        <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
      </div>
      <button type="submit" class="btn btn-success rounded-pill">Simpan</button>
      <a href="{{ route('categories.index') }}" class="btn btn-secondary rounded-pill">Kembali</a>
    </form>
  </div>
</div>
@endsection