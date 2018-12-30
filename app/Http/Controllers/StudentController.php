<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function students_panel($id){
       
        $user = User::findOrFail($id);
        return view('students/panel',compact('user'));
        
     }
}