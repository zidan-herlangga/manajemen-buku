<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'title', 'author', 'year'];

    // ✅ Tambahkan relasi ini:
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
