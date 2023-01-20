<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist_video extends Model
{
    use HasFactory;

    protected $table = "playlist_videos";
    protected $primaryKey = "pv_id";

}
