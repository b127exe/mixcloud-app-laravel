<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video_interact extends Model
{
    use HasFactory;

    protected $table = "video_interacts";
    protected $primaryKey = "vinteract_id";

}
