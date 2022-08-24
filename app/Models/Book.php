<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'quantity',
        'description',
        'image',
        'pages',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'price',
        'sprice',
        'author'
    ];

    public function categories() {
        return $this->belongsToMany(Category::class);
    }
    
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }
}
