<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use Illuminate\Routing\Route as RoutingRoute;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['auth','userAuth']], function(){

    /* Homepage route */
    Route::get('/', [MainController::class, 'getHomepage'])->name('user.home');

    /* Movie page route */
    Route::get('/movie/{id}', [MainController::class, 'getMovie']);

    Route::post('/rating', [App\Http\Controllers\HomeController::class, 'rateMovie'])->name('rating');
    Route::post('/like-movie', [App\Http\Controllers\HomeController::class, 'likeUnlikeMovie'])->name('like.movie');
    Route::get('/liked-movies', [App\Http\Controllers\HomeController::class, 'likedMovies'])->name('user.movies');
});
Route::group(['middleware' => ['auth','adminAuth']], function(){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::delete('user/{id}', [App\Http\Controllers\HomeController::class, 'deleteUser'])->name('user.delete');
});

Auth::routes();

