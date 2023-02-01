<?php

use App\Http\Controllers\SongVideoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


//Dashboard Routes

Route::group(["prefix" => "dashboard"],function(){
  Route::get('/',[SongVideoController::class , 'index'])->middleware(['emailCheck','adminRole']);
  // Route::get('/',['middleware' => 'emailCheck' , 'uses' => 'SongVideoController@index']);
  //Artist Routes
  Route::get('/add-artist',[SongVideoController::class , 'addArtist'])->middleware(['emailCheck','adminRole']);
  Route::post('/artist-store',[SongVideoController::class , 'artistStore'])->middleware(['emailCheck','adminRole']);
  Route::get('/sort-artist',[SongVideoController::class , 'artistSort'])->middleware(['emailCheck','adminRole']);
  Route::get('/delete-artist/{id}',[SongVideoController::class , 'artistDelete'])->middleware(['emailCheck','adminRole']);
  Route::get('/update-artist/{id}',[SongVideoController::class , 'artistUpdate'])->middleware(['emailCheck','adminRole']);
  Route::post('/update-store/{id}',[SongVideoController::class , 'artistUpdateStore'])->middleware(['emailCheck','adminRole']);
  //Album Routes
  Route::get('/add-album',[SongVideoController::class , 'addAlbum'])->middleware(['emailCheck','adminRole']);
  Route::post('/album-store',[SongVideoController::class , 'albumStore'])->middleware(['emailCheck','adminRole']);
  Route::get('/sort-album',[SongVideoController::class , 'albumSort'])->middleware(['emailCheck','adminRole']);
  Route::get('/delete-album/{id}',[SongVideoController::class , 'albumDelete'])->middleware(['emailCheck','adminRole']);
  Route::get('/update-album/{id}',[SongVideoController::class , 'albumUpdate'])->middleware(['emailCheck','adminRole']);
  Route::post('/update-store-album/{id}',[SongVideoController::class , 'albumUpdateStore'])->middleware(['emailCheck','adminRole']);
  //Songs Routes
  Route::get('/add-song',[SongVideoController::class, 'addSong'])->middleware(['emailCheck','adminRole']);
  Route::post('/song-store',[SongVideoController::class, 'songStore'])->middleware(['emailCheck','adminRole']);
  Route::get('/sort-song',[SongVideoController::class, 'songSort'])->middleware(['emailCheck','adminRole']);
  Route::get('/delete-song/{id}',[SongVideoController::class, 'songDelete'])->middleware(['emailCheck','adminRole']);
  Route::get('/update-song/{id}',[SongVideoController::class, 'songUpdate'])->middleware(['emailCheck','adminRole']);
  Route::post('/update-store-song/{id}',[SongVideoController::class, 'songUpdateStore'])->middleware(['emailCheck','adminRole']);
  //Video Routes
  Route::get('/add-video',[SongVideoController::class , 'addVideo'])->middleware(['emailCheck','adminRole']);
  Route::post('/video-store',[SongVideoController::class , 'videoStore'])->middleware(['emailCheck','adminRole']);
  Route::get('/sort-video',[SongVideoController::class , 'videoSort'])->middleware(['emailCheck','adminRole']);
  Route::get('/delete-video/{id}',[SongVideoController::class , 'videoDelete'])->middleware(['emailCheck','adminRole']);
  Route::get('/update-video/{id}',[SongVideoController::class , 'videoUpdate'])->middleware(['emailCheck','adminRole']);
  Route::post('/update-store-video/{id}',[SongVideoController::class , 'videoUpdateStore'])->middleware(['emailCheck','adminRole']);
  //Others Routes
  Route::get('/calender',[SongVideoController::class , 'calender'])->middleware(['emailCheck','adminRole']);
  Route::get('/profile-overview',[SongVideoController::class , 'overview'])->middleware(['emailCheck','adminRole']);
  //Playlist Routes
  Route::get('/sort-playlist',[SongVideoController::class , 'playlistSort'])->middleware(['emailCheck','adminRole']);
  Route::get('/update-playlist/{id}',[SongVideoController::class , 'playlistUpdate'])->middleware(['emailCheck','adminRole']);
  Route::post('/update-playlist-store/{id}',[SongVideoController::class , 'playlistUpdateStore'])->middleware(['emailCheck','adminRole']);
});



//Websites Routes

Route::group(["prefix" => "mixcloud"],function(){
   Route::get('/',[WebController::class , "index"])->middleware(['emailCheck','userRole']);
   Route::get('/search-content',[WebController::class , "searchContent"])->middleware(['emailCheck','userRole']);
   Route::get('/all-songs',[WebController::class , "allSongs"])->middleware(['emailCheck','userRole']);
   Route::get('/all-videos',[WebController::class , "allVideos"])->middleware(['emailCheck','userRole']);
   Route::get('/all-playlist',[WebController::class , "playlist"])->middleware(['emailCheck','userRole']);
   //add songs to playlist
   Route::get('/song-to-playlist/{id}',[WebController::class , "SongToPlaylist"])->middleware(['emailCheck','userRole']);
   Route::post('/song-to-playlist-store',[WebController::class , "SongToPlaylistStore"])->middleware(['emailCheck','userRole']);
   //add videos to playlist
   Route::get('/video-to-playlist/{id}',[WebController::class , "VideoToPlaylist"])->middleware(['emailCheck','userRole']);
   Route::post('/video-to-playlist-store',[WebController::class , "VideoToPlaylistStore"])->middleware(['emailCheck','userRole']);
   //add playlist
   Route::post('/add-playlist-store',[WebController::class , "addPlaylistStore"])->middleware(['emailCheck','userRole']);
   Route::get('/playlist-detail/{id}',[WebController::class , "playlistDetail"])->middleware(['emailCheck','userRole']);
   //add review on songs
   Route::get('/song-review/{id}',[WebController::class , "songReview"])->middleware(['emailCheck','userRole']);
   Route::post('/song-review-store',[WebController::class , "songReviewStore"])->middleware(['emailCheck','userRole']);
   //add review on videos
   Route::get('/video-review/{id}',[WebController::class , "videoReview"])->middleware(['emailCheck','userRole']);
   Route::post('/video-review-store',[WebController::class , "videoReviewStore"])->middleware(['emailCheck','userRole']);
   //other information routes
   Route::get('/about',[WebController::class , 'about'])->middleware(['emailCheck','userRole']);
   Route::get('/contact',[WebController::class , 'contact'])->middleware(['emailCheck','userRole']);
   Route::get('/setting',[WebController::class , 'setting'])->middleware(['emailCheck','userRole']);
   Route::post('/setting-store',[WebController::class , 'settingStore'])->middleware(['emailCheck','userRole']);
   Route::get('/all-reviews',[WebController::class , 'allReviews'])->middleware(['emailCheck','userRole']);
});

//Auth Routes

Route::get('/login',[UserController::class , 'Login'])->middleware('loginCheck');
Route::post('/login-store',[UserController::class , 'LoginStore'])->middleware('loginCheck');
Route::get('/register',[UserController::class , 'Register'])->middleware('loginCheck');
Route::post('/register-store',[UserController::class , 'RegisterStore'])->middleware('loginCheck');
Route::get('/logout',[UserController::class , 'Logout']);

Route::get('/',function(){

  return redirect('/login');

})->middleware('loginCheck');



Route::get('/destroy',function(){
    
   session()->flush();
   return redirect('/');

});