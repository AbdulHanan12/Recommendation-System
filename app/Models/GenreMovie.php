<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenreMovie extends Model
{
    use HasFactory;

    protected $table = 'genre_movie';
    public function genre(){
        return $this->belongsTo(Genre::class);
    }

    public function movie(){
        return $this->belongsTo(Movie::class);
    }
}
