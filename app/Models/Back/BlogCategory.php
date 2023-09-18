<?php

namespace App\Models\back;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $table = 'blog_categories';
    protected $fillable = ['name', 'status'];
}
