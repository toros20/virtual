<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $fillable = [
        'name','short_name','description','semester','oficial'
     ];

     public function clasecourse()
    {
        return $this->hasMany('App\Clasecourse');
    }
}
