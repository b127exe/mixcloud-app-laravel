<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song_interact extends Model
{
    use HasFactory;

    protected $table = "song_interacts";
    protected $primaryKey = "sinteract_id";

}
