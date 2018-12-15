<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
       'name','short_name','is_semestral','modality_id'
    ];
}
