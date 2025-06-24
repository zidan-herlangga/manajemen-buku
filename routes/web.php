<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::resource('books', BookController::class);
    Route::resource('categories', CategoryController::class);

    Route::get('/books/invoice/all', [BookController::class, 'invoiceAll'])->name('books.invoice.all');
    Route::get('/categories/invoice/all', [CategoryController::class, 'invoiceAll'])->name('categories.invoice.all');
    Route::get('/books/{book}/invoice/pdf', [BookController::class, 'invoicePerBookPdf'])->name('books.invoice.book.pdf');

    // Route::get('/books/invoice/{book}', [BookController::class, 'invoicePerBook'])->name('books.invoice.book');
});
