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


Route::group(["prefix" => "dashboard"],function(){
  Route::get('/',[SongVideoController::class , 'index']);
  //Artist Routes
  Route::get('/add-artist',[SongVideoController::class , 'addArtist']);
  Route::post('/artist-store',[SongVideoController::class , 'artistStore']);
  Route::get('/sort-artist',[SongVideoController::class , 'artistSort']);
  Route::get('/delete-artist/{id}',[SongVideoController::class , 'artistDelete']);
  Route::get('/update-artist/{id}',[SongVideoController::class , 'artistUpdate']);
  Route::post('/update-store/{id}',[SongVideoController::class , 'artistUpdateStore']);
  //Album Routes
  Route::get('/add-album',[SongVideoController::class , 'addAlbum']);
  Route::post('/album-store',[SongVideoController::class , 'albumStore']);
  Route::get('/sort-album',[SongVideoController::class , 'albumSort']);
  Route::get('/delete-album/{id}',[SongVideoController::class , 'albumDelete']);
  Route::get('/update-album/{id}',[SongVideoController::class , 'albumUpdate']);
  Route::post('/update-store-album/{id}',[SongVideoController::class , 'albumUpdateStore']);
  //Songs Routes
  Route::get('/add-song',[SongVideoController::class, 'addSong']);
  Route::post('/song-store',[SongVideoController::class, 'songStore']);
  Route::get('/sort-song',[SongVideoController::class, 'songSort']);
  Route::get('/delete-song/{id}',[SongVideoController::class, 'songDelete']);
  Route::get('/update-song/{id}',[SongVideoController::class, 'songUpdate']);
  Route::post('/update-store-song/{id}',[SongVideoController::class, 'songUpdateStore']);
  //Video Routes
  Route::get('/add-video',[SongVideoController::class , 'addVideo']);
  Route::post('/video-store',[SongVideoController::class , 'videoStore']);
  Route::get('/sort-video',[SongVideoController::class , 'videoSort']);
  Route::get('/delete-video/{id}',[SongVideoController::class , 'videoDelete']);
  Route::get('/update-video/{id}',[SongVideoController::class , 'videoUpdate']);
  Route::post('/update-store-video/{id}',[SongVideoController::class , 'videoUpdateStore']);
});

Route::group(["prefix" => "mixcloud"],function(){
   Route::get('/',[WebController::class , "index"]);
   Route::get('/search-content',[WebController::class , "searchContent"]);
   Route::get('/all-songs',[WebController::class , "allSongs"]);
   Route::get('/all-videos',[WebController::class , "allVideos"]);
   Route::get('/all-playlist',[WebController::class , "playlist"]);
   //add songs to playlist
   Route::get('/song-to-playlist/{id}',[WebController::class , "SongToPlaylist"]);
   Route::post('/song-to-playlist-store',[WebController::class , "SongToPlaylistStore"]);
   //add videos to playlist
   Route::get('/video-to-playlist/{id}',[WebController::class , "VideoToPlaylist"]);
   Route::post('/video-to-playlist-store',[WebController::class , "VideoToPlaylistStore"]);
   //add playlist
   Route::post('/add-playlist-store',[WebController::class , "addPlaylistStore"]);
});

Route::get('/login',[UserController::class , 'Login']);
Route::post('/login-store',[UserController::class , 'LoginStore']);
Route::get('/register',[UserController::class , 'Register']);
Route::post('/register-store',[UserController::class , 'RegisterStore']);
Route::get('/logout',[UserController::class , 'Logout']);

Route::get('/',function(){

  return redirect('/login');

});

Route::get('/destroy',function(){
    
   session()->flush();

});