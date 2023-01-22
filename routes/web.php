<?php

use App\Http\Controllers\SongVideoController;
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
});