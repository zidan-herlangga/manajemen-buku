@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header">
            <h3><i class="bi bi-book"></i> Detail Buku</h3>
        </div>
        <div class="card-body">
            @if ($book->cover)
                <img src="{{ asset('storage/' . $book->cover) }}" alt="Cover Buku" class="img-thumbnail mb-3" width="150">
            @endif
            <p><strong>Judul:</strong> {{ $book->title }}</p>
            <p><strong>Penulis:</strong> {{ $book->author }}</p>
            <p><strong>Penerbit:</strong> {{ $book->publisher }}</p>
            <p><strong>Tahun:</strong> {{ $book->year }}</p>
            <p><strong>Kategori:</strong> {{ $book->category->name }}</p>

            <a href="{{ route('books.index') }}" class="btn btn-secondary rounded-pill">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('books.edit', $book) }}" class="btn btn-warning rounded-pill">
                <i class="bi bi-pencil-square"></i> Edit
            </a>
        </div>
    </div>
@endsection
