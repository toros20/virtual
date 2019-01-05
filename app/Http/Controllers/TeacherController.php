<?php

namespace App\Http\Controllers;

use App\User;
use App\Assignment;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function teachers_panel($id){
       
        //obtenemos el id del usuario student
        $user = User::findOrFail($id);
        
        //obtenemos los datos de la matricula de este usuario
        //$enroll = Enrollment::where('user_id',$id)->get();

        //obtenemos los datos del curso de este student
        //$course = Course::where('id',$enroll[0]->course_id)->get();

        //obtenemos las asignaciones de este curso, clases, y docentes
        $asignaciones = Assignment::where('user_id',$id)->get();
        
        //se envian los datos a la vista panel
        return view('teachers/panel',compact('user','asignaciones'));
        
     }
}