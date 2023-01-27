<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Song;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use function Ramsey\Uuid\v1;

class SongVideoController extends Controller
{

   public function index()
   {
      $artist = Artist::all();
      return view('dashboard-pages.home')->with('artist', $artist);
   }

   //return add artist page
   public function addArtist()
   {
      $artist = Artist::all();
      return view('dashboard-pages.artist.addArtist')->with('artist', $artist);
   }

   //add artist to database
   public function artistStore(Request $request)
   {

      $validator = Validator::make($request->all(), [
         'name' => 'required|max:191',
         'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
      ]);

      if ($validator->fails()) {

         return response()->json([

            'status' => 400,
            'errors' => $validator->messages()

         ]);
      } else {

         $artist = new Artist;
         $artist->artist_name = $request->input("name");

         if ($request->hasFile('image')) {

            $img = $request->file('image');
            $imgName = $img->getClientOriginalName();
            $imgName = Str::random(8) . $imgName;
            $img->move('storage/artist-images/', $imgName);
            $artist->artist_picture = $imgName;
         }

         $artist->save();

         return response()->json([

            'status' => 200,
            'message' => "Add Successfully"

         ]);
      }
   }

   public function artistUpdate($id){

    $findArtist =  Artist::find($id);
    $artist =  Artist::all();

    return view('dashboard-pages.artist.updateArtist',compact('findArtist','artist'));
       
   }

   public function artistUpdateStore(Request $request , $id){

      $validator = Validator::make($request->all(), [
         'name' => 'required|max:191',
         'newImage' => 'required|image|mimes:png,jpg,jpeg|max:2048',
      ]);

     $artist = Artist::find($id);
     
     $artist->artist_name = $request->input('name');

     if($request->hasFile('newImage')){

      $img = $request->file('newImage');
      $imgName = $img->getClientOriginalName();
      $imgName = Str::random(8) . $imgName;
      $img->move('storage/artist-images/', $imgName);
      unlink('storage/artist-images/'.$artist->artist_picture);

     }
     else{

      $imgName = $request->input('oldImage');

     }
     $artist->artist_picture = $imgName;
     $artist->save();

     return response()->json([

        'status' => 200,
        'message' => "Update Successfully"

     ]);

   }

   public function artistSort(Request $request)
   {
      $search = $request['search'];
      $artist = DB::table('artists')->where('artist_name', 'like', "%$search%")->get();
      return view('dashboard-pages.artist.sortArtist')->with('artist', $artist);
   }

   public function artistDelete($id)
   {

      $artist = Artist::find($id);

      if ($artist != null) {

         unlink('storage/artist-images/' . $artist->artist_picture);
         $artist->delete();
         return redirect('/dashboard/sort-artist');
      }
   }

   //  ALBUM CODE START
   public function addAlbum()
   {
      $artist = Artist::all();
      return view('dashboard-pages.album.addAlbum')->with('artist', $artist);
   }
   public function albumStore(Request $request)
   {

      $validator = Validator::make($request->all(), [
         'coverName' => 'required|max:191',
         'coverImage' => 'required|image|mimes:png,jpg,jpeg',
         'artist' => 'required',
      ]);

      if ($validator->fails()) {
         return response()->json([

            'status' => 400,
            'errors' => $validator->messages()

         ]);
      } else {

         $album = new Album;
         $album->album_name = $request->input('coverName');
         $album->artist_id = $request->input('artist');

         if ($request->hasFile('coverImage')) {
            $img = $request->file('coverImage');
            $imgName = $img->getClientOriginalName();
            $imgName = Str::random(8) . $imgName;
            $img->move('storage/album-covers/', $imgName);
            $album->cover_picture = $imgName;
         }

         $album->save();

         return response()->json([

            'status' => 200,
            'message' => "Add Successfully"

         ]);
      }
   }

   public function albumUpdate($id){

     $artist = Artist::all();
     $findAlbum = Album::find($id);

     return view('dashboard-pages.album.updateAlbum',compact("artist","findAlbum"));

   }

   public function albumUpdateStore(Request $request , $id){

      $validator = Validator::make($request->all(), [
         'coverName' => 'required|max:191',
         'newCoverImage' => 'required|image|mimes:png,jpg,jpeg',
         'artist' => 'required',
      ]);

      $album = Album::find($id);

      if($album != null){

        $album->album_name = $request->input('coverName');
        $album->artist_id = $request->input('artist');

        if($request->hasFile('newCoverImage')){

         $img = $request->file('newCoverImage');
         $imgName = $img->getClientOriginalName();
         $imgName = Str::random(8) . $imgName;
         $img->move('storage/album-covers/', $imgName);
         unlink('storage/album-covers/'.$album->cover_picture);

        } else {

         $imgName = $request->input('oldCoverPicture');

        }

        $album->cover_picture = $imgName;
        $album->save();

        return response()->json([

         'status' => 200,
         'message' => "Update Successfully"
 
      ]);

      }

   }

   public function albumSort(Request $request)
   {

      $search = $request['search'];

      $artist = Artist::all();
      $album = DB::table('albums')->join("artists", "albums.artist_id", "=", "artists.artist_id")->select('albums.*', 'artists.*')->where("album_name", 'like', "%$search%")->get();
      return view('dashboard-pages.album.sortAlbum', compact('artist', 'album'));
   }

   public function albumDelete($id)
   {

      $album = Album::find($id);

      if ($album != null) {

         unlink('storage/album-covers/' . $album->cover_picture);
         $album->delete();
         return redirect('/dashboard/sort-album');
      }
   }

   //SONGS code start
   public function addSong()
   {

      $artist = Artist::all();
      $album = Album::all();
      return view('dashboard-pages.song.addSong', compact('artist', 'album'));
   }
   public function songStore(Request $request)
   {

      $validator = Validator::make($request->all(), [
         'title' => 'required|max:50',
         'lyrics' => 'required',
         'track' => 'required',
         'genre' => 'required',
         'duration' => 'required',
         'artist' => 'required',
         'album' => 'required',
         'song' => 'required',
      ]);

      if ($validator->fails()) {
         return response()->json([

            'status' => 400,
            'errors' => $validator->messages()

         ]);
      } else {
         $song = new Song;
         $song->title = $request->input('title');
         $song->lyrics = $request->input('lyrics');
         $song->track = $request->input('track');
         $song->mtime = $request->input('duration');
         $song->album_id = $request->input('album');
         $song->artist_id = $request->input('artist');
         $song->genre = $request->input('genre');

         if ($request->hasFile('song')) {
            $songs = $request->file('song');
            $songName = $songs->getClientOriginalName();
            $songName = Str::random(8) . $songName;
            $songs->move('storage/songs/', $songName);
            $song->song_path = $songName;
         }

         $song->save();
         return response()->json([

            'status' => 200,
            'message' => "Add Successfully"

         ]);
      }
   }

   public function songUpdate($id){

     $artist = Artist::all();
     $findSong = Song::find($id);
     $album = Album::all();

     return view('dashboard-pages.song.updateSong',compact('artist','album','findSong'));

   }

   public function songUpdateStore(Request $request , $id){



   }

   public function songSort(Request $request)
   {

      $type = $request['type'];
      $search = $request['search'];

      $artist = Artist::all();
      if ($search != null) {
         $songs = DB::table('songs')->join('artists', 'songs.artist_id', '=', 'artists.artist_id')->join('albums', 'songs.album_id', '=', 'albums.album_id')->select('songs.*', 'artists.*', 'albums.*')->where("$type", "like", "%$search%")->get();
      } else {
         $songs = DB::table('songs')->join('artists', 'songs.artist_id', '=', 'artists.artist_id')->join('albums', 'songs.album_id', '=', 'albums.album_id')->select('songs.*', 'artists.*', 'albums.*')->get();
      }

      return view('dashboard-pages.song.sortSong', compact("artist", "songs"));
   }

   public function songDelete($id)
   {

      $song = Song::find($id);

      if ($song != null) {

         unlink("storage/songs/" . $song->song_path);
         $song->delete();
         return redirect('/dashboard/sort-song');
      }
   }

   //Video Code Start
   public function addVideo(){

      $artist = Artist::all();
      $album = Album::all();
      return view('dashboard-pages.video.addVideo',compact("artist","album"));

   }
   public function videoStore(Request $request){
      
      $validator = Validator::make($request->all(), [
         'title' => 'required|max:50',
         'description' => 'required',
         'duration' => 'required',
         'artist' => 'required',
         'album' => 'required',
         'video' => 'required',
      ]);
      if ($validator->fails()) {
         return response()->json([

            'status' => 400,
            'errors' => $validator->messages()

         ]);
      } else{

       $video = new Video;
       $video->title = $request->input('title');
       $video->description = $request->input('description');
       $video->duration = $request->input('duration');
       $video->album_id = $request->input('album');
       $video->artist_id = $request->input('artist');

       if ($request->hasFile('video')) {
         $vid = $request->file('video');
         $vidName = $vid->getClientOriginalName();
         $vidName = Str::random(8) . $vidName;
         $vid->move('storage/videos/', $vidName);
         $video->video_path = $vidName;
      }

       $video->save();
       return response()->json([

         'status' => 200,
         'message' => "Add Successfully"

      ]);

      }

   }
   public function videoSort(Request $request){
 
       $search = $request['search'];

      $artist = Artist::all();
      $videos = DB::table('videos')->join('artists', 'videos.artist_id', '=', 'artists.artist_id')->join('albums', 'videos.album_id', '=', 'albums.album_id')->select('videos.*', 'artists.*', 'albums.*')->where('title','like',"%$search%")->get();
      return view('dashboard-pages.video.sortVideo',compact('artist','videos'));
   }

   public function videoDelete($id){

    $video =  Video::find($id);

    if($video !=  null){

      unlink('storage/videos/'.$video->video_path);
      $video->delete();
      return redirect('/dashboard/sort-video');

    }

   }
}
