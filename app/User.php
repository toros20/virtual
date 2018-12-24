<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','lastname','cuenta', 'fecha_nacimiento','role','activo', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    //el siguiente codigo se utiliza para encriptar el campo de password
    public function setPasswordAttribute($value)
    {
        if($value != ""){
            $this->attributes['password'] = bcrypt($value);
        }
    }

    public function assignment()
    {
        return $this->hasMany('App\Assignment');
    }
}
