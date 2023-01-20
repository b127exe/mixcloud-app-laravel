<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
