<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeywordMovie extends Model
{
    use HasFactory;

    protected $table = 'keyword_movie';
    public function keyword(){
        return $this->belongsTo(Keyword::class);
    }
}
