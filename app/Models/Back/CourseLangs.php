<?php

namespace App\Models\Back;

use Illuminate\Database\Eloquent\Model;

class CourseLangs extends Model
{
    protected $table = 'course_langs';
    protected $fillable = ['lang'];
}
