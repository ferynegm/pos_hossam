<?php

namespace App\Models\back;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';
    protected $fillable = ['title', 'description', 'image', 'date', 'author', 'category', 'status'];

    public function category_name(){
        return $this->belongsTo("App\Models\Back\BlogCategory" , "category");
    }
    
    public function author_name(){
        return $this->belongsTo("App\Models\User" , "author");
    }
}
