<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sectioncourse extends Model
{
    protected $fillable = [
        'course_id','section','year'
    ];
}
