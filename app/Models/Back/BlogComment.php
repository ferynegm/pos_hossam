<?php

namespace App\Models\back;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    protected $table = 'blog_comments';
    protected $fillable = ['blog', 'comment', 'author', 'status'];

    public function blog_name(){
        return $this->belongsTo("App\Models\Back\Blog" , "blog");
    }

    public function author_name_blog_comment(){
        return $this->belongsTo("App\Models\User" , "author");
    }
}
