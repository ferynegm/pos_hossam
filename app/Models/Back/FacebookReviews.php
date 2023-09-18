<?php

namespace App\Models\Back;

use Illuminate\Database\Eloquent\Model;

class FacebookReviews extends Model
{
    protected $table = 'facebook_reviews';
    protected $fillable = ['review'];
}
