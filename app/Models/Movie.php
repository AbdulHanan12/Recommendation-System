<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    public function vote(){
        return $this->belongsTo(Vote::class);
    }

    public function image(){
        return $this->hasOne(Image::class);
    }

    public function ratings(){
        return $this->hasMany(Rating::class);
    }

    public function movieGenre(){
        return $this->hasMany(GenreMovie::class);
    }

    public function movieCompanies(){
        return $this->hasMany(CompanyMovie::class);
    }

    public function movieKeywords(){
        return $this->hasMany(KeywordMovie::class);
    }

    public function likedMovie() {
        return $this->hasOne(LikedMovie::class);
    }
}
