<?php

namespace App\Http\Controllers;

use App\User;
use App\Assignment;
use DB;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function teachers_panel($id){
       
        //obtenemos el id del usuario student
        $user = User::findOrFail($id);

        //obtenemos las asignaciones de este curso, clases, y docentes
        $asignaciones = Assignment::where('user_id',$id)->get();

        //$firstclass = Assignment::where('user_id',$id)->first();

        //obtenemos las primera clases asignada.
        $firstcourse = DB::table('assignments')
                        ->join('courses', 'assignments.course_id', '=', 'courses.id')
                        ->where('assignments.user_id',$id)
                        ->first();

        //obtenemos los primeros 10 mensajes de este usuario
        $mensajes = DB::table('msj_'.$id)
                        ->join('users', 'msj_'.$id.'.remitente', '=', 'users.id')
                        ->limit(10)
                        ->orderBy('msj_'.$id.'.id', 'desc')
                        ->get();
        
        //se envian los datos a la vista panel
        return view('teachers/panel',compact('user','asignaciones','firstcourse','mensajes'));
        
     } 
}