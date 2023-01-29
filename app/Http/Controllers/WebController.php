<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class WebController extends Controller
{
    public function index(){

      $artist = DB::table('artists')->skip(0)->take(4)->get();
      $songs = DB::table('songs')->skip(0)->take(3)->get();
      $videos = DB::table('videos')->skip(0)->take(3)->get();


      return view('website.webHome',compact('artist','songs','videos'));
    }

    public function searchContent(Request $request){

    $table = $request['table'];
    $search = $request['search'];

    if($search != null){

     if($table == 'songs'){

      $songs = DB::table('songs')->join('albums','songs.album_id','=','albums.album_id')->join('artists','songs.artist_id','=','artists.artist_id')->select('songs.*','albums.*','artists.*')->where('title','like',"%$search%")->get();

      return view('website.songs')->with('songs',$songs);

     }
     else{

      $videos = DB::table('videos')->join('albums','videos.album_id','=','albums.album_id')->join('artists','videos.artist_id','=','artists.artist_id')->select('videos.*','albums.*','artists.*')->where('title','like',"%$search%")->get();

      return view('website.videos')->with('videos',$videos);

     }

    }
    else {
      return redirect('/mixcloud');
    }

    }

    public function allSongs(Request $request){

     $search = $request['search'];
     $field = $request['field'];

     if($search != null){

      $songs = DB::table('songs')->join('albums','songs.album_id','=','albums.album_id')->join('artists','songs.artist_id','=','artists.artist_id')->select('songs.*','albums.*','artists.*')->where($field,'like',"%$search%")->get();

     }
     else{

      $songs = DB::table('songs')->join('albums','songs.album_id','=','albums.album_id')->join('artists','songs.artist_id','=','artists.artist_id')->select('songs.*','albums.*','artists.*')->get();

     }

     return view('website.allSongs')->with('songs',$songs);

    }

    public function allVideos(Request $request){

     $search = $request['search'];
     $field = $request['field'];

     if($search != null){

      $videos = DB::table('videos')->join('albums','videos.album_id','=','albums.album_id')->join('artists','videos.artist_id','=','artists.artist_id')->select('videos.*','albums.*','artists.*')->where($field,'like',"%$search%")->get();

     } else {

      $videos = DB::table('videos')->join('albums','videos.album_id','=','albums.album_id')->join('artists','videos.artist_id','=','artists.artist_id')->select('videos.*','albums.*','artists.*')->get();

     }

     return view('website.allVideos')->with('videos',$videos);

    }

    public function addPlaylistStore(Request $request){

      $validator = Validator::make($request->all(), [
        'name' => 'required|max:191',
        'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
     ]);

    }
    
}
