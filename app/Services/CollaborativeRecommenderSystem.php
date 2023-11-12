<?php

namespace App\Services;

use App\Models\GenreMovie;
use App\Models\Movie;
use Illuminate\Support\Facades\DB;
use Throwable;

class CollaborativeRecommenderSystem{

     /**
     * Get Suggested Movies.
     *
     * @return mixed | void
     */
    public static function suggestMoviesFor(Movie $movie){
        try{
            $selMovieGenres = $movie->movieGenre->pluck('genre_id');
            $getSuggestedMovies = GenreMovie::whereIn('genre_id',$selMovieGenres)
                                            ->where('movie_id','!=',$movie->id)
                                            ->inRandomOrder()
                                            ->pluck('movie_id');
            return $getSuggestedMovies;
        } catch (Throwable $e) {
            report($e);
            return false;
        }
    }
}
