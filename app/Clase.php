<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $fillable = [
        'name','short_name','description','semester','oficial','modality_id'
     ];

     public function clasecourse()
    {
        return $this->hasMany('App\Clasecourse');
    }

    public function assignment()
    {
        return $this->hasMany('App\Assignment');
    }
}
