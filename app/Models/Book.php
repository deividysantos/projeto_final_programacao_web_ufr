<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = "book";

    public $timestamps = false;

    protected $fillable = [
        'id',
        'title',
        'ISBN',
        'author',
        'price',
        'publishingCompany',
        'releaseYear'
    ];
}
