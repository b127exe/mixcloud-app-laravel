<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    public function index(){

      $artist = Artist::all();
      $songs = DB::table('songs')->skip(0)->take(3)->get();
      $videos = DB::table('videos')->skip(0)->take(3)->get();


      return view('website.webHome',compact('artist','songs','videos'));
    }
    
}
