<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Image;
use App\Models\Movie;
use App\Models\Rating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CollaborativeRecommenderSystem;
use Throwable;

class MainController extends Controller
{
    private $base_path = "http://image.tmdb.org/t/p/w500/";

     /**
     * Show Homepage for Users
     *
     * @return \Illuminate\Contracts\Support\Renderable | mixed | void
     */
    public function getHomepage(Request $request) {
        try {
            // Validate the value...
            $search = $request->search;
            /* HEADER RANDOM MOVIE */
            $headerMovie = null;
            $full_path = null;
            $base_path = $this->base_path;
            if(!$search){
                $headerMovie = Movie::whereHas('image')
                                    ->with('image','movieKeywords.keyword','movieCompanies.company','movieGenre.genre')
                                    // ->inRandomOrder()
                                    ->orderByDesc('release_date')
                                    ->first();
                $backdrop_path = $headerMovie->image->backdrop_path;
                $full_path = $this->base_path . $backdrop_path;
            }

            /* CATEGORIES */
            $genres = Genre::inRandomOrder()->get(['id','genre']);
            $genresRandomMovies = [];

            foreach ($genres as $genre) {
                $genreId = $genre->id;
                $movies = Movie::
                                whereHas('movieGenre',function($q) use($genreId){
                                    $q->where('genre_id', $genreId);
                                })
                                ->when($search, function ($query) use($search) {
                                    $query->where('title','like', '%'.$search.'%');
                                })
                                ->with('movieGenre')
                                ->whereHas('image')
                                ->with('image')
                                ->inRandomOrder()
                                // ->limit(10)
                                ->get();
                                // dd($movies);
                if(count($movies) > 0){
                    $genresRandomMovies[$genre->genre] = $movies;
                }
            }
            // dd($genresRandomMovies);
            return view('homepage', compact('headerMovie', 'full_path', 'base_path', 'genres', 'genresRandomMovies'));
        } catch (Throwable $e) {
            report($e);
            return false;
        }
    }

     /**
     * Get Movie with Details
     *
     * @return \Illuminate\Contracts\Support\Renderable | mixed | void
     */
    public function getMovie($id) {
        try{

            $movie = Movie::where('id',$id)
                            ->with('image','movieGenre.genre','movieKeywords.keyword')
                            ->with('likedMovie',function($q){
                                $q->where('user_id',auth()->user()->id);
                            })
                            ->with('ratings',function($q){
                                $q->where('user_id',auth()->user()->id);
                            })
                            ->first();
            $movie_rating = 0;
            if(count($movie->ratings) > 0){
                $movie_rating = $movie->ratings->first()->rating;
            }
            $base_path = $this->base_path;
            $backdrop_path = (isset($movie->image)) ? $this->base_path . $movie->image->backdrop_path : $this->base_path ."/images/movie_graphic.png";

            $collab_movies = [];

            $content_suggestions = CollaborativeRecommenderSystem::suggestMoviesFor($movie);
            $content_movies = Movie::whereIn('id', $content_suggestions)->with('image','movieGenre.genre','movieKeywords.keyword')->get();

            return view('movie', compact('base_path', 'backdrop_path', 'movie', 'collab_movies', 'content_movies','movie_rating'));

        } catch (Throwable $e) {
            report($e);
            return false;
        }
    }
}
