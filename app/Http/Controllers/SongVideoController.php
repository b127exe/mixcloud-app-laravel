<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
    public function artistStore(Request $request){

    //    print_r($request['name']);
   


       $validator = Validator::make($request->all(),[
          'name' => 'required|max:191',
          'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
       ]);

       if($validator->fails()){

          return response()->json([
            
            'status'=>400,
            'errors'=>$validator->messages()

          ]);

       }
       else{

          $artist = new Artist;
          $artist->artist_name = $request->input("name");
          
          if($request->hasFile('image')){

           $img = $request->file('image');
           $imgName = $img->getClientOriginalExtension();
           $imgName = Str::random(8).$imgName;
           $img->move('storage/artist-images/',$imgName);
           $artist->artist_picture = $imgName;

          }

          $artist->save();

          return response()->json([
            
            'status'=>200,
            'message'=>"Add Successfull"

          ]);

       }

    }
}
