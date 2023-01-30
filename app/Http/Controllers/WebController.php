<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Playlist;
use App\Models\Playlist_song;
use App\Models\Playlist_video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class WebController extends Controller
{
  public function index()
  {

    $artist = DB::table('artists')->skip(0)->take(4)->get();
    $songs = DB::table('songs')->skip(0)->take(3)->get();
    $videos = DB::table('videos')->skip(0)->take(3)->get();


    return view('website.webHome', compact('artist', 'songs', 'videos'));
  }

  public function searchContent(Request $request)
  {

    $table = $request['table'];
    $search = $request['search'];

    if ($search != null) {

      if ($table == 'songs') {

        $songs = DB::table('songs')->join('albums', 'songs.album_id', '=', 'albums.album_id')->join('artists', 'songs.artist_id', '=', 'artists.artist_id')->select('songs.*', 'albums.*', 'artists.*')->where('title', 'like', "%$search%")->get();

        return view('website.songs')->with('songs', $songs);
      } else {

        $videos = DB::table('videos')->join('albums', 'videos.album_id', '=', 'albums.album_id')->join('artists', 'videos.artist_id', '=', 'artists.artist_id')->select('videos.*', 'albums.*', 'artists.*')->where('title', 'like', "%$search%")->get();

        return view('website.videos')->with('videos', $videos);
      }
    } else {
      return redirect('/mixcloud');
    }
  }

  public function allSongs(Request $request)
  {

    $search = $request['search'];
    $field = $request['field'];

    if ($search != null) {

      $songs = DB::table('songs')->join('albums', 'songs.album_id', '=', 'albums.album_id')->join('artists', 'songs.artist_id', '=', 'artists.artist_id')->select('songs.*', 'albums.*', 'artists.*')->where($field, 'like', "%$search%")->get();
    } else {

      $songs = DB::table('songs')->join('albums', 'songs.album_id', '=', 'albums.album_id')->join('artists', 'songs.artist_id', '=', 'artists.artist_id')->select('songs.*', 'albums.*', 'artists.*')->get();
    }

    return view('website.allSongs')->with('songs', $songs);
  }

  public function allVideos(Request $request)
  {

    $search = $request['search'];
    $field = $request['field'];

    if ($search != null) {

      $videos = DB::table('videos')->join('albums', 'videos.album_id', '=', 'albums.album_id')->join('artists', 'videos.artist_id', '=', 'artists.artist_id')->select('videos.*', 'albums.*', 'artists.*')->where($field, 'like', "%$search%")->get();
    } else {

      $videos = DB::table('videos')->join('albums', 'videos.album_id', '=', 'albums.album_id')->join('artists', 'videos.artist_id', '=', 'artists.artist_id')->select('videos.*', 'albums.*', 'artists.*')->get();
    }

    return view('website.allVideos')->with('videos', $videos);
  }

  public function addPlaylistStore(Request $request)
  {

    $validator = Validator::make($request->all(), [
      'name' => 'required|max:191',
      'bio' => 'required',
    ]);

    if ($validator->fails()) {

      return response()->json([

        'status' => 400,
        'errors' => $validator->messages()

      ]);
    } else {

      $playlist = new Playlist;
      $playlist->playlist_name = $request->input('name');
      $playlist->bio = $request->input('bio');
      $playlist->user_id = session()->get('id');
      $playlist->save();
      return response()->json([

        'status' => 200,
        'message' => "Add Successfully"

      ]);
    }
  }
  public function playlist()
  {

    $playlist = Playlist::all();

    return view('website.playlist')->with('playlist', $playlist);
  }

  //Add song to Playlist

  public function SongToPlaylist($id)
  {

    $playlist = DB::select('select * from playlists where user_id = ?', [session()->get('id')]);

    return view('website.songToPlaylist', compact('id', 'playlist'));
  }

  public function SongToPlaylistStore(Request $request)
  {

    $validator = Validator::make($request->all(), [
      'playlistId' => 'required',
    ]);

    if ($validator->fails()) {

      return response()->json([

        'status' => 400,
        'errors' => $validator->messages()

      ]);
    }
    else{

     $playlist_song = new Playlist_song;
     $playlist_song->playlist_id = $request->input('playlistId');
     $playlist_song->song_id = $request->input('id');
     $playlist_song->save();
     return response()->json([

      'status' => 200,
      'message' => "Add Successfully"

    ]);

    }

  }

  //Add Videos to Playlist

  public function VideoToPlaylist($id){

    $playlist = DB::select('select * from playlists where user_id = ?', [session()->get('id')]);

    return view('website.videoToPlaylist',compact('id','playlist'));

  }

  public function VideoToPlaylistStore(Request $request){

    $validator = Validator::make($request->all(), [
      'playlistId' => 'required',
    ]);

    if ($validator->fails()) {

      return response()->json([

        'status' => 400,
        'errors' => $validator->messages()

      ]);
    }
    else{

    $playlist_video = new Playlist_video;
    $playlist_video->video_id = $request->input('id');
    $playlist_video->playlist_id = $request->input('playlistId');
    $playlist_video->save();
    return response()->json([

      'status' => 200,
      'message' => "Add Successfully"

    ]);

    }

  }
}
