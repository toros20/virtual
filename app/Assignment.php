<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $fillable = [
        'user_id','course_id','section','clase_id','year'
    ];

    public function course(){

        return $this->belongsTo('App\Course', 'course_id');
    }

    public function clase(){

        return $this->belongsTo('App\Clase', 'clase_id');
    }

    public function user(){

        return $this->belongsTo('App\User', 'user_id');
    }
}
