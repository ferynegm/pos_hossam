<?php

namespace App\Models\Back;

use Illuminate\Database\Eloquent\Model;

class PolicyToParent extends Model
{
    protected $table = 'policy_to_parents';
    protected $fillable = ['description'];

}
