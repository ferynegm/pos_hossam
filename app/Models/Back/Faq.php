<?php

namespace App\Models\Back;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faqs';
    protected $fillable = ['order', 'title', 'description'];
}
