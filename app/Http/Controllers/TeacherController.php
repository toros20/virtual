<?php

namespace App\Http\Controllers;

use App\User;
use App\Assignment;
use DB;
use Carbon\Carbon;

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
     
     //seccion que controla el panel inicial de la seccion academica
     function academia($user_id){

        //obtenemos los datos del docente
        $user = User::findOrFail($user_id);

         //obtenemos las asignaciones de este docentes
         $asignaciones = DB::table('assignments')
                        ->join('courses', 'assignments.course_id', '=', 'courses.id')
                        ->join('clases', 'assignments.clase_id', '=', 'clases.id')
                        ->Select('assignments.user_id','courses.id as course_id','clases.id as clase_id','courses.short_name as course','clases.short_name as clase','assignments.section')
                        ->where('assignments.user_id','=',$user_id)
                        ->get();
                       // dd($asignaciones);

        return view('teachers/academia',compact('user','asignaciones'));
     }

     function  estudiantes(){

     }
     //funcion para enviar datos a la seccion de acumulativos de los docentes
     function  acumulativos($user_id,$course,$section,$clase,$parcial){

         //obtenemos los datos del docente
         $user = User::findOrFail($user_id);

         //se asigna el parcial eleccionado
         $parcial_actual = $parcial;

         //obtenemos los cursos a los cuales les da clase este docente
         //se usan en el select
         $cursos = DB::table('assignments')
                        ->join('courses', 'assignments.course_id', '=', 'courses.id')
                        ->Select('courses.id as course_id','courses.short_name as course')
                        ->where('assignments.user_id','=',$user_id)
                        ->distinct()->get();
                       // dd($asignaciones);
        $clase_actual=DB::table('clases')
                        ->where('id','=',$clase)
                        ->get();
        $curso_actual=DB::table('courses')
                        ->where('id','=',$course)
                        ->get();
        $section_actual=$section;

        //obtenemos las asignaciones de este docentes para el menu del lado quierdo togle
        $asignaciones = DB::table('assignments')
                        ->join('courses', 'assignments.course_id', '=', 'courses.id')
                        ->join('clases', 'assignments.clase_id', '=', 'clases.id')
                        ->Select('assignments.user_id','courses.id as course_id','clases.id as clase_id','courses.short_name as course','clases.short_name as clase','assignments.section')
                        ->where('assignments.user_id','=',$user_id)
                        ->get();

        //obtener las tareas creadas para este curso seccion y clase
        //para mostrar en la tabla
        $tbl_task='task_'.$course.'_'.$section;//nombre de la tabla a buscar
        
        $tasks = DB::table($tbl_task)
                    ->where([
                            ['clase', '=', $clase],
                            ['teacher', '=', $user_id],
                            ['parcial', '=', $parcial]
                            ])
                    ->orderBy('id','ASC')
                    ->get();
        //obtenemos los documentos subidos por este docente a este cursos secion y clase
        $files = DB::table('files')
                    ->where([
                            ['clase_id', '=', $clase],
                            ['course_id', '=', $course],
                            ['section', '=', $section],
                            ['user_id', '=', $user_id],
                            ['parcial', '=', $parcial]
                            ])
                    ->orderBy('id','ASC')
                    ->get();
          //obtenemos los videos subidos por este docente a este cursos secion y clase
          $videos = DB::table('videos')
          ->where([
                  ['clase_id', '=', $clase],
                  ['course_id', '=', $course],
                  ['section', '=', $section],
                  ['user_id', '=', $user_id],
                  ['parcial', '=', $parcial]
                  ])
          ->orderBy('id','ASC')
          ->get();


        return view('teachers/acumulativos',compact(
            'user','cursos','tasks','clase_actual','curso_actual','section_actual','parcial_actual','asignaciones','files','videos'));

    }

     //funcion que devolvera las clases asignadas a un curso seleccinoado por el docente en acumulativos
    function loadclassesfordocente(Request $request){

         //recibimos el curso y el id del docente 
         $user_id=$request->user;
         $course_id=$request->course_id;
 
         //determinar las secciones que tiene asignado este docente en este curso
        $clases = DB::table('assignments')
                    ->join('clases', 'assignments.clase_id', '=', 'clases.id')
                    ->Select('clases.id as clase_id','clases.short_name as clase')
                    ->where([
                                ['course_id', '=', $course_id],
                                ['user_id', '=', $user_id],
                            ])
                    ->distinct()->get();
         //enviamos las seccinoes a la vista ajax
         return view('ajax/loadclassesfordocente',compact('clases'));
    }

    //funcion que devolvera las secciones asignadas a un curso y clase seleccinoado por el docente en acumulativos
    function loadsectionsfordocentes(Request $request){

        //recibimos el curso y el id del docente 
        $user_id=$request->user;
        $course_id=$request->course_id;
        $clase_id=$request->clase_id;

        //determinar las secciones que tiene asignado este docente en este curso
        $sections = Assignment::where([
            ['course_id', '=', $course_id],
            ['clase_id', '=', $clase_id],
            ['user_id', '=', $user_id],
        ])->Select('section')->distinct()->get();
        //enviamos las seccinoes a la vista ajax
        return view('ajax/loadsectionsfordocentes',compact('sections'));
    }

    //funcion para almacer una tarea creada por el docente
    function send_task(Request $request){

        //recibimos los datos de la tarea(task) a crear 
        $course_id=$request->_course_id;
        $clase_id=$request->_clase_id;
        $secciones=$request->_secciones;
        $tipo=$request->_tipo;
        $parcial=$request->_parcial;
        $titulo=$request->_titulo;
        $descripcion=$request->_descripcion;
        $valor=$request->_valor;
        $fecha_entrega1=$request->_fecha_entrega;
        $teacher=$request->_user;

        //variables utilizadas para volver al curso seccion y clase donde esta actualmente el docente
        $curso_actual=$request->_curso_actual;
        $section_actual=$request->_section_actual;
        $clase_actual=$request->_clase_actual;

        //cambiamos el formato de fecha
        $fecha_entrega = date("Y-m-d",strtotime($fecha_entrega1));

        //para cada una de las secciones que se ha seleccionado
        foreach ($secciones as  $seccion) {

            //convertimos en minuscula la letra de la seccion
            $seccion=strtolower($seccion);
            //nombre de la tabla task a almacenar
            $tbl_task='task_'.$course_id.'_'.$seccion;
            $msj= DB::table($tbl_task)->insert([

                'teacher'=>$teacher,
                'clase'=>$clase_id,
                'parcial'=>$parcial,
                'titulo'=>$titulo,
                'descripcion'=>$descripcion,
                'evaluada'=>0,
                'fecha_entrega'=>$fecha_entrega,
                'fecha_publicada'=>Carbon::now(),
                'valor'=>$valor,
                'tipo'=>$tipo
                
            ]);
        }

        //buscamos las tareas del curso seccion y clase donde esta actualmente el docente
        $tbl_task_actual='task_'.$curso_actual.'_'.$section_actual;//nombre de la tabla a buscar
        $tasks = DB::table($tbl_task_actual)
        ->where([
                ['clase', '=', $clase_actual],
                ['teacher', '=', $teacher],
                ])
        ->orderBy('id','ASC')
        ->get();

        return view('ajax/send_task',compact('tasks'));

    }

    function  documentos(){

    }

    function  examen(){

    }

    function  descargas(){

    }

    }