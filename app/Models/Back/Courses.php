<?php

namespace App\Models\Back;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $table = 'courses';
    protected $fillable = ['name', 'description', 'teacher', 'whatsapp_teacher', 'image', 'video', 'content', 'details', 'sidebar', 'langs_filter', 'ages_filter', 'stages_filter', 'status'];

    public function teacher_name(){
        return $this->belongsTo("App\Models\Back\Teacher" , "teacher", "group_id");
    }
    
    public function lang_name(){
        return $this->belongsTo("App\Models\Back\CourseLangs" , "langs_filter", "lang");
    }
}
