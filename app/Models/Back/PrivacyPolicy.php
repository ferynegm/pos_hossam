<?php

namespace App\Models\Back;

use Illuminate\Database\Eloquent\Model;

class PrivacyPolicy extends Model
{
    protected $table = 'privacy_policies';
    protected $fillable = ['description'];

}
