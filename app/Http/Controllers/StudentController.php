<?php

namespace App\Http\Controllers;

use App\User;
use App\Enrollment;
use App\Course;
use App\Clasecourse;
use App\Assignment;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function students_panel($id){
       
        //obtenemos el id del usuario student
        $user = User::findOrFail($id);
        
        //obtenemos los datos de la matricula de este usuario
        $enroll = Enrollment::where('user_id',$id)->get();

        //obtenemos los datos del curso de este student
        $course = Course::where('id',$enroll[0]->course_id)->get();

        //obtenemos las asignaciones de este curso, clases, y docentes
        $asignaciones = Assignment::where([
            ['course_id', '=', $enroll[0]->course_id],
            ['section', '=', $enroll[0]->section],
        ])->get();
        
        //se envian los datos a la vista panel
        return view('students/panel',compact('user','course','enroll','clases','asignaciones'));
        
     }
}