<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'book'; // Nama tabel yang sesuai dengan migrasi
    protected $fillable = ['title', 'author', 'year']; // Kolom yang dapat
}
