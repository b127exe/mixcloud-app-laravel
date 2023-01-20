<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist_song extends Model
{
    use HasFactory;

    protected $table = "playlist_songs";
    protected $primaryKey = "ps_id";

}
