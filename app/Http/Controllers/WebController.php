<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Playlist;
use App\Models\Playlist_song;
use App\Models\Playlist_video;
use App\Models\Song_interact;
use App\Models\User;
use App\Models\Video_interact;
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

  //Playlist Work Start here

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

  public function playlistDetail($id){

    $playlist = Playlist::find($id);

    return view('website.singlePlaylist',compact('playlist'));

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

  //Review Work on songs

  public function songReview($id){
 
   return view('website.songReview')->with('id',$id);

  }

  public function songReviewStore(Request $request){

    $validator = Validator::make($request->all(), [
      'review' => 'required',
      'like' => 'required'
    ]);

    if ($validator->fails()) {

      return response()->json([

        'status' => 400,
        'errors' => $validator->messages()

      ]);
    }
    else{

     $song_interact = new Song_interact;
     $song_interact->song_like = $request->input('like');
     $song_interact->review = $request->input('review');
     $song_interact->song_id = $request->input('song');
     $song_interact->user_id = session()->get('id');
     $song_interact->save();
     return response()->json([

      'status' => 200,
      'message' => "Add Successfully"

    ]);

    }

  }

  //Review Work on videos

  public function videoReview($id){

   return view('website.videoReview')->with('id',$id);

  }
  
  public function videoReviewStore(Request $request){

    $validator = Validator::make($request->all(), [
      'review' => 'required',
      'like' => 'required'
    ]);

    if ($validator->fails()) {

      return response()->json([

        'status' => 400,
        'errors' => $validator->messages()

      ]);
    }
    else{

      $video_interact = new Video_interact;
      $video_interact->video_like = $request->input('like');
      $video_interact->review = $request->input('review');
      $video_interact->user_id = session()->get('id');
      $video_interact->video_id = $request->input('video');
      $video_interact->save();

      return response()->json([

        'status' => 200,
        'message' => "Add Successfully"
  
      ]);

    }

  }

  //Other Information Pages

  public function about(){

  $songs = DB::table('songs')->count();
  $videos = DB::table('videos')->count();
  $albums = DB::table('albums')->count();

   return view('website.about',compact('songs','videos','albums'));

  }

  public function contact(){

   return view('website.contact');

  }

  public function setting(){

   return view('website.userSetting');

  }

  public function allReviews(){

    $id = session()->get('id');

   $reviewSong = DB::table('song_interacts')->join('songs','song_interacts.song_id','=','songs.sid')->select('song_interacts.*','songs.*')->where('song_interacts.user_id','=',"$id")->get();

   $reviewVideo = DB::table('video_interacts')->join('videos','video_interacts.video_id','=','videos.vid')->select('video_interacts.*','videos.*')->where('video_interacts.user_id','=',"$id")->get(); 

   return view('website.allReviews',compact('reviewSong','reviewVideo'));

  }


}
