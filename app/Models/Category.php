<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    protected $table = 'categories';
    protected $primaryKey = 'id';

    // Relasi ke Book
    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
