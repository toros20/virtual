<?php

namespace App\Http\Controllers;

use App\User;
use App\Assignment;
use DB;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    //funcion inicial al panel docente, 

     //funcion del panel docente, al momento de 
     //seleccionar un curso y seccion del panel izquierdo
     //los parametros vienen por la url, si no los trae le inserta los siguientes
     function teachers_panel($user_id=-1,$course_id=-1,$section='x'){
       
        if ($course_id==0||$section=='x') {
        
        //obtenemos las asignaciones de curso y clases de este docentes
         $asignaciones = Assignment::where('user_id',$user_id)->first();
         $course_id=$asignaciones->course_id;
         $section=$asignaciones->section;

        }
         //obtenemos el id del usuario docente
         $user = User::findOrFail($user_id);

         //obtenemos las asignaciones de este curso, clases, y docentes
         $asignaciones = Assignment::where('user_id',$user_id)->get();
 
         //obtenemos las primera clases asignada de este docente en este curso y seccion
         //si es necesaria este variable.
         $firstcourse = DB::table('assignments')
                         ->join('courses', 'assignments.course_id', '=', 'courses.id')
                         ->where([
                            ['assignments.user_id','=',$user_id],
                            ['course_id', '=', $course_id],
                            ['section', '=', $section],
                            ])
                         ->first();
 
         //obtenemos los primeros 30 mensajes de este usuario 
         //que sean de este curso y seccion (curso que ha seleccionado)
         $mensajes = DB::table('msj_'.$user_id)
                         ->join('users', 'msj_'.$user_id.'.remitente', '=', 'users.id')
                         ->limit(30)
                         ->orderBy('msj_'.$user_id.'.id', 'desc')
                         ->Select(
                             'msj_'.$user_id.'.id as msj_id',
                             'msj_'.$user_id.'.comentarios',
                             'msj_'.$user_id.'.remitente',
                             'msj_'.$user_id.'.curso_id',
                             'msj_'.$user_id.'.section', 
                             'msj_'.$user_id.'.mensaje',
                             'msj_'.$user_id.'.fecha',
                             'msj_'.$user_id.'.tipo',
                             'msj_'.$user_id.'.key',
                             'users.name','users.lastname','users.role','users.sexo' )
                             ->where([
                                 ['curso_id', '=', $course_id],
                                 ['section', '=', $section],
                             ])
                         ->get();
         
         //se envian los datos a la vista panel
         return view('teachers/panel',compact('user','asignaciones','firstcourse','mensajes'));
         
     }
    

    }