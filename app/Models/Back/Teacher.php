<?php

namespace App\Models\Back;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';
    protected $fillable = ['id', 'group_id', 'name', 'job', 'description', 'image', 'video_link', 'video_desc', 'gender', 'status'];
}
