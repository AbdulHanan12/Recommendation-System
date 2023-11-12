<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\LikedMovie;
use App\Models\Movie;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;
use Throwable;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable | mixed | void
     */
    public function index()
    {
        try{
            $users = User::where('is_admin','!=',1)->orderByDesc('created_at')->simplePaginate(10);
            return view('home',['users'=> $users]);
        } catch (Throwable $e) {
            report($e);
            return false;
        }
    }

     /**
     * Delete the User
     *
     * @return mixed | void
     */
    public function deleteUser($id){
        try{
            User::where('id',$id)->delete();
            return redirect()->back();
        } catch (Throwable $e) {
            report($e);
            return false;
        }
    }

     /**
     * Like/Unlike the Movie
     *
     * @return mixed | void
     */
    public function likeUnlikeMovie(Request $request){
        try{
            $getLikeMovie = LikedMovie::where('movie_id',$request->movie_id)->first();
            if($getLikeMovie){
                    $getLikeMovie->delete();
            }else{
                    LikedMovie::create([
                        "movie_id" => $request->movie_id,
                        "user_id" => auth()->user()->id,
                    ]);
            }
            return redirect()->back();
        } catch (Throwable $e) {
            report($e);
            return false;
        }
    }

     /**
     * This function is used to rate the movie
     *
     * @return mixed | void
     */
    public function rateMovie(Request $request){
        try{
            Rating::updateOrCreate([
                'movie_id' => $request->movie_id,
                'user_id' => auth()->user()->id
            ], [
                'movie_id' => $request->movie_id,
                'user_id' => auth()->user()->id,
                'rating' => $request->rate
            ]);
            return redirect()->back();
        } catch (Throwable $e) {
            report($e);
            return false;
        }
    }

     /**
     * User Liked Movie Listing
     *
     * @return \Illuminate\Contracts\Support\Renderable | mixed | void
     */
    public function likedMovies() {
        try{
            $genres = Genre::inRandomOrder()->get(['id','genre']);
            $genresRandomMovies = [];
            $base_path = "http://image.tmdb.org/t/p/w500/";
            foreach ($genres as $genre) {
                $genreId = $genre->id;
                $movies = Movie::
                                whereHas('movieGenre',function($q) use($genreId){
                                    $q->where('genre_id', $genreId);
                                })
                                ->whereHas('likedMovie',function($q){
                                    $q->where('user_id', auth()->user()->id);
                                })
                                ->with('movieGenre')
                                ->whereHas('image')
                                ->with('image')
                                ->get();
                if(count($movies) > 0){
                    $genresRandomMovies[$genre->genre] = $movies;
                }
            }
            return view('liked-movie', compact('base_path', 'genres', 'genresRandomMovies'));
        } catch (Throwable $e) {
            report($e);
            return false;
        }
    }
}
