<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = ['movie_id','user_id','rating'];
    public $timestamps = false;


    public function getMovie(){
        return $this->hasOne(Movie::class);
    }
}
