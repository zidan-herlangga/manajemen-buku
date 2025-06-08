<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Category;

class BookSeeder extends Seeder
{
  public function run(): void
  {
    $category = Category::first(); // pakai kategori pertama

    Book::create([
      'category_id' => $category->id,
      'title' => 'Panduan Laravel',
      'author' => 'Zidan H',
      'year' => 2022,
    ]);
  }
}
