<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Song;
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
      
   }
}
