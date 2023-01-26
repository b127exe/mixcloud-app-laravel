<?php

use App\Http\Controllers\SongVideoController;
use App\Http\Controllers\WebController;
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
  //Album Routes
  Route::get('/add-album',[SongVideoController::class , 'addAlbum']);
  Route::post('/album-store',[SongVideoController::class , 'albumStore']);
  Route::get('/sort-album',[SongVideoController::class , 'albumSort']);
  Route::get('/delete-album/{id}',[SongVideoController::class , 'albumDelete']);
  //Songs Routes
  Route::get('/add-song',[SongVideoController::class, 'addSong']);
  Route::post('/song-store',[SongVideoController::class, 'songStore']);
  Route::get('/sort-song',[SongVideoController::class, 'songSort']);
  Route::get('/delete-song/{id}',[SongVideoController::class, 'songDelete']);
  //Video Routes
  Route::get('/add-video',[SongVideoController::class , 'addVideo']);
  Route::post('/video-store',[SongVideoController::class , 'videoStore']);
  Route::get('/sort-video',[SongVideoController::class , 'videoSort']);
});

Route::group(["prefix" => "mixcloud"],function(){
   Route::get('/',[WebController::class , "index"]);
});