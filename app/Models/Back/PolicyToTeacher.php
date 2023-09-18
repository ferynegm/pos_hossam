<?php

namespace App\Models\Back;

use Illuminate\Database\Eloquent\Model;

class PolicyToTeacher extends Model
{
    protected $table = 'policy_to_teachers';
    protected $fillable = ['description'];

}
