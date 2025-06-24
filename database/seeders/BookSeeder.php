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

    $books = [
        [
            'category_id' => $category->id,
            'title' => 'Panduan Laravel 10',
            'publisher' => 'Gramedia',
            'author' => 'Airlangga Book',
            'cover' => 'covers/laravel10.jpg',
            'year' => 2022,
        ],
        [
            'category_id' => $category->id,
            'title' => 'Belajar PHP dari Nol',
            'publisher' => 'Elex Media Komputindo',
            'author' => 'Budi Santoso',
            'cover' => 'covers/php_nol.jpg',
            'year' => 2021,
        ],
        [
            'category_id' => $category->id,
            'title' => 'Mastering JavaScript',
            'publisher' => 'Mizan',
            'author' => 'Andi Wijaya',
            'cover' => 'covers/js_master.jpg',
            'year' => 2020,
        ],
        [
            'category_id' => $category->id,
            'title' => 'Dasar-Dasar Python',
            'publisher' => 'Tiga Serangkai',
            'author' => 'Citra Lestari',
            'cover' => 'covers/python_dasar.jpg',
            'year' => 2019,
        ],
        [
            'category_id' => $category->id,
            'title' => 'Pemrograman C++ Modern',
            'publisher' => 'Andi Publisher',
            'author' => 'Rahmat Hidayat',
            'cover' => 'covers/cpp_modern.jpg',
            'year' => 2023,
        ],
        [
            'category_id' => $category->id,
            'title' => 'Algoritma dan Logika',
            'publisher' => 'Deepublish',
            'author' => 'Sinta Dewi',
            'cover' => 'covers/algoritma_logika.jpg',
            'year' => 2018,
        ],
        [
            'category_id' => $category->id,
            'title' => 'Basis Data MySQL',
            'publisher' => 'Salemba Empat',
            'author' => 'Doni Pratama',
            'cover' => 'covers/mysql_db.jpg',
            'year' => 2020,
        ],
        [
            'category_id' => $category->id,
            'title' => 'Desain Web dengan Bootstrap',
            'publisher' => 'Penerbit Informatika',
            'author' => 'Lina Setiawan',
            'cover' => 'covers/bootstrap_web.jpg',
            'year' => 2021,
        ],
        [
            'category_id' => $category->id,
            'title' => 'Mobile Apps Flutter',
            'publisher' => 'Erlangga',
            'author' => 'Fahmi Akbar',
            'cover' => 'covers/flutter_apps.jpg',
            'year' => 2022,
        ],
        [
            'category_id' => $category->id,
            'title' => 'Kecerdasan Buatan Dasar',
            'publisher' => 'Bumi Aksara',
            'author' => 'Yuniar Nugroho',
            'cover' => 'covers/ai_dasar.jpg',
            'year' => 2023,
        ],
    ];

    foreach ($books as $data) {
        Book::create($data);
    }
  }
}
