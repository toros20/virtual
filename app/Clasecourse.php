<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clasecourse extends Model
{

    protected $fillable = [
        'course_id','clase_id','year'
    ];

    public function course(){

        return $this->belongsTo('App\Course', 'course_id');
    }

    public function clase(){

        return $this->belongsTo('App\Clase', 'clase_id');
    }

    
}
