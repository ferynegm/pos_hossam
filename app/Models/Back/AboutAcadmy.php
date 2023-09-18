<?php

namespace App\Models\Back;

use Illuminate\Database\Eloquent\Model;

class AboutAcadmy extends Model
{
    protected $table = 'about_acadmies';
    protected $fillable = ['title', 'description', 'media', 'media_videos', 'status'];
}
