<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'author', 'description', 'genre', 'price', 'cover_image', 'publication_date'
    ];

    public function isImageAUrl()
    {
        return filter_var($this->cover_image, FILTER_VALIDATE_URL);
    }
}
