@extends('layouts.app')

@section('title', 'Daftar Kategori')

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
            <div class="d-flex justify-content-end">
                <a href="{{ route('categories.invoice.all') }}" class="btn btn-success rounded-pill mb-3" target="_blank">
                    <i class="bi bi-printer"></i> Cetak Invoice Semua Kategori
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle ">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <td> {{ $loop->iteration }} </td>
                                <td>{{ $category->name }}</td>
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <td>

                                        <a href="{{ route('categories.edit', $category) }}"
                                            class="btn btn-sm btn-warning rounded-pill">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('categories.destroy', $category) }}" method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger rounded-pill">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </div>
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
    </div>
@endsection
