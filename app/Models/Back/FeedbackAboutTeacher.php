<?php

namespace App\Models\back;

use Illuminate\Database\Eloquent\Model;

class FeedbackAboutTeacher extends Model
{
    protected $table = 'feedback_about_teachers';
    protected $fillable = ['teacher', 'image'];

    public function teacher_name(){
        return $this->belongsTo("App\Models\Back\Teacher" , "teacher", "group_id");
    }
}
