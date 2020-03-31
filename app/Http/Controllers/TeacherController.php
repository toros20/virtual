<?php

namespace App\Http\Controllers;

use App\User;
use App\Assignment;
use App\Enrollment;
use App\Course;
use DB;
use Carbon\Carbon;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{

    //funcion inicial al panel docente, 

     //funcion del panel docente, al momento de 
     //seleccionar un curso y seccion del panel izquierdo
     //los parametros vienen por la url, si no los trae le inserta los siguientes
     function teachers_panel($user_id=-1,$course_id=-1,$section='x'){

         /*************************SEGURIDAD*******************/
            //control de seguridad
            // Get the currently authenticated user...
            if ( !($user = Auth::user()) ){
                return "ACCESO SOLO PARA USUARIOS REGISTRADOS."; 
            }
            
            if( $user->role!='teacher'){
                return ("ÁREA EXCLUSIVA DEL DOCENTE.");
            }

            $id_user_log = Auth::id();
            if( $id_user_log != $user_id){
                return "ACCESO NO PERMITIDO AL USUARIO ACTUAL."; 
            }
        /*************************SEGURIDAD*******************/

       
        if ($course_id==0||$section=='x') {
        
        //obtenemos las asignaciones de curso y clases de este docentes
         $asignaciones = Assignment::where('user_id',$user_id)->first();
         $course_id=$asignaciones->course_id;
         $section=$asignaciones->section;

        }

         //registrar su ingreso en la tabla login_teachers
         $msj= DB::table('login_teachers')->insert([

            'teacher'=>$user_id,
            'fecha_ingreso'=>Carbon::now(),
            'ip'=>$_SERVER['REMOTE_ADDR'],
            'course_id'=>$course_id,
            'section'=>$section,
            'tecnologia'=>$_SERVER['HTTP_USER_AGENT']
           
        ]);


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
                         ->limit(500)
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

            //obtenemos las tareas para el panel derecho de tareas
        $tbl_tareashoy = 'task_'.$course_id.'_'.strtolower($section);
        
        $tareas_hoy = DB::table($tbl_tareashoy)
                                ->join('clases', 'clases.id', '=' , $tbl_tareashoy.'.clase' )
                                ->join('users', 'users.id', '=' , $tbl_tareashoy.'.teacher' )
                                ->where([
                                    [$tbl_tareashoy.'.teacher', '=', $user_id],
                                    ['clases.semester', '!=', 2],
                                    [$tbl_tareashoy.'.fecha_entrega', '=', date("Y-m-d")],
                                ])
                                ->orderBy($tbl_tareashoy.'.fecha_publicada', 'desc')
                                ->Select(
                                    $tbl_tareashoy.'.titulo',
                                    $tbl_tareashoy.'.valor', 
                                    $tbl_tareashoy.'.parcial',
                                    $tbl_tareashoy.'.fecha_publicada',
                                    $tbl_tareashoy.'.fecha_entrega',
                                    'clases.short_name',
                                    'clases.id as clase_id',
                                    'users.name',
                                    'users.lastname'
                                   )
                                ->get();
         
         //se envian los datos a la vista panel
         return view('teachers/panel',compact('user','asignaciones','firstcourse','mensajes','tareas_hoy'));
         
     }
     
     //seccion que controla el panel inicial de la seccion academica
     function academia($user_id){

       /*************************SEGURIDAD*******************/
            //control de seguridad
            // Get the currently authenticated user...
            if ( !($user = Auth::user()) ){
                return "ACCESO SOLO PARA USUARIOS REGISTRADOS."; 
            }
            
            if( $user->role!='teacher'){
                return ("ÁREA EXCLUSIVA DEL DOCENTE.");
            }

            $id_user_log = Auth::id();
            if( $id_user_log != $user_id){
                return "ACCESO NO PERMITIDO AL USUARIO ACTUAL."; 
            }
        /*************************SEGURIDAD*******************/

        //obtenemos los datos del docente
        $user = User::findOrFail($user_id);

        // Codigo para ver clases del primer Semestre
         //obtenemos las asignaciones de este docentes
         $asignaciones = DB::table('assignments')
                        ->join('courses', 'assignments.course_id', '=', 'courses.id')
                        ->join('clases', 'assignments.clase_id', '=', 'clases.id')
                        ->Select('assignments.user_id','courses.id as course_id','clases.id as clase_id','courses.short_name as course','clases.short_name as clase','assignments.section','courses.modality_id')
                        //->where('assignments.user_id','=',$user_id)
                        ->where([
                            ['assignments.user_id', '=', $user_id],
                            ['clases.semester', '!=', 2],

                        ])
                        ->get(); 
        
        // Codigo para ver clases del segundo Semestre
         /*$asignaciones = DB::table('assignments')
                        ->join('courses', 'assignments.course_id', '=', 'courses.id')
                        ->join('clases', 'assignments.clase_id', '=', 'clases.id')
                        ->Select('assignments.user_id','courses.id as course_id','clases.id as clase_id','courses.short_name as course','clases.short_name as clase','assignments.section','courses.modality_id')
                        ->where([
                            ['assignments.user_id', '=', $user_id],
                            ['clases.semester', '!=', 1],
                        ])
                        ->get(); */


                        //dd($asignaciones);
        //obtenemos la modalidad del primer grado asignado, para determinar a que modalidad pertenece el docente
        $modalidad=$asignaciones[0]->modality_id;

        return view('teachers/academia',compact('user','asignaciones','modalidad'));
     }
     //funcion para mostrar los estudiantes
     function students($user_id,$course,$section){

         /*************************SEGURIDAD*******************/
            //control de seguridad
            // Get the currently authenticated user...
            if ( !($user = Auth::user()) ){
                return "ACCESO SOLO PARA USUARIOS REGISTRADOS."; 
            }
            
            if( $user->role!='teacher'){
                return ("ÁREA EXCLUSIVA DEL DOCENTE.");
            }

            $id_user_log = Auth::id();
            if( $id_user_log != $user_id){
                return "ACCESO NO PERMITIDO AL USUARIO ACTUAL."; 
            }
        /*************************SEGURIDAD*******************/

        //obtenemos los datos del docente
        $user = User::findOrFail($user_id);

         //obtenemos los id de los alumnos matriculados en este curso y seccion
         $students =   DB::table('users')
                    ->join('enrollments', 'users.id', '=', 'enrollments.user_id')
                    ->where ([
                        ['users.role', '=', 'student'],
                        ['enrollments.course_id', '=', $course],
                        ['enrollments.section', '=', $section]
                    ])
                    ->Select('users.name','users.lastname','users.sexo','users.id','users.cuenta')
                    ->orderBy('users.sexo','asc')
                    ->orderBy('users.name','asc')
                    ->get();

         //obtenemos las asignaciones de este docentes
         $asignaciones = DB::table('assignments')
                        ->join('courses', 'assignments.course_id', '=', 'courses.id')
                        ->Select('assignments.user_id','courses.id as course_id','courses.short_name as course','assignments.section','courses.modality_id')
                        //->where('assignments.user_id','=',$user_id)
                        ->where([
                            ['assignments.user_id', '=', $user_id]
                        ])
                        ->get(); 
        
        return view('teachers/students',compact('user','students','asignaciones'));


     }
     //funcion para enviar datos a la seccion de acumulativos de los docentes
     function  acumulativos($user_id,$course,$section,$clase,$parcial){

        /*************************SEGURIDAD*******************/
            //control de seguridad
            // Get the currently authenticated user...
            if ( !($user = Auth::user()) ){
                return "ACCESO SOLO PARA USUARIOS REGISTRADOS."; 
            }
            
            if( $user->role!='teacher'){
                return ("ÁREA EXCLUSIVA DEL DOCENTE.");
            }

            $id_user_log = Auth::id();
            if( $id_user_log != $user_id){
                return "ACCESO NO PERMITIDO AL USUARIO ACTUAL."; 
            }
        /*************************SEGURIDAD*******************/

         //obtenemos los datos del docente
         $user = User::findOrFail($user_id);

         //se asigna el parcial eleccionado
         $parcial_actual = $parcial;

         //convertimos en minuscula la seccion
         $section=strtolower($section);

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

        $course_id=$request->select_course;
        $clase_id=$request->select_clases;

        $secciones=$request->sections;

        $tipo=$request->select_tipo;
        $parcial=$request->select_parcial;
        $titulo=$request->titulo;
        $descripcion=$request->descripcion;
        $valor=$request->valor;
        $fecha_entrega1=$request->date_acum;
        //$teacher=$request->_user;
        $teacher=$request->user_id;

        //variables utilizadas para volver al curso seccion y clase donde esta actualmente el docente
        //$curso_actual=$request->curso_actual;
        //$section_actual=$request->section_actual;
        //$clase_actual=$request->clase_actual;
        $ultima_seccion_ingresada = 0;
        //cambiamos el formato de fecha
        $fecha_entrega = date("Y-m-d",strtotime($fecha_entrega1));

        //para cada una de las secciones que se ha seleccionado
        foreach ($secciones as  $seccion) {
            
            //convertimos en minuscula la letra de la seccion
            $seccion=strtolower($seccion);
            //nombre de la tabla task principal del curso y seccion a almacenar
            $tbl_task='task_'.$course_id.'_'.$seccion;
            //nombre de la tabla taskstudent del curso y seccion a  por alumno
            $tbl_taskstudent='taskstudent_'.$course_id.'_'.$seccion;
            
            if ($id_task= DB::table($tbl_task)->insertGetId([//confirmamos que la tarea si se inserte , y obtenemos is id recien asignado

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
                
            ])){//en caso de que la tarea se si inserte en la tabla asignada , ahora se envia a los estudiantes de este curso y seccion

                //obtenemos los id de los alumnos matriculados en este curso y seccion
                $Enrollments = Enrollment::where([
                    ['course_id', '=', $course_id],
                    ['section', '=', $seccion],
                ])->get();

                foreach ($Enrollments as $enroll) {
                    //insertamos la tarea en la task_student que corresponde al curso y seccion
                    $msj2= DB::table($tbl_taskstudent)->insert([

                        'student'=>$enroll->user_id,
                        'task_'.$course_id.'_'.$seccion.'_id'=>$id_task,
                        'valor_obtenido'=>0   
                    ]);
                }//fin del ciclo para cada alumno de este curso
                
            }//fin del if -> si se inserta la tarea en la tabla task del curso y seccion
            else{
                echo "Error Al Almacenar la Tarea, intentelo nuevamente";
            }
            $ultima_seccion_ingresada = $seccion; // se requiere para redireccinar al final
        }//fin del for each -> fin del ciclo por cada seccion seleccionada
        


        return redirect()->route('teachers/acumulativos/{user_id}/{course_id}/{section}/{clase}/{parcial}', [$teacher,$course_id,$ultima_seccion_ingresada,$clase_id,$parcial]);
        //return view('ajax/send_task',compact('tasks','curso_actual','section_actual'));

    }

    //funcion para recibir los datos del formulario para subir un archivo
    function send_file(Request $request){

        //obtenemos las secciones seleccionadas
        $secciones=$request->input('sections');
        $parcial = $request->select_parcial_file;
       
        //obtenemos el nombre original del archivo
        $name_original = $request->file('document')->getClientOriginalName();

        //obtenemos la extension original del archivo
        $extension = $request->file('document')->getClientOriginalExtension();

        //almacenamos el documento en la carpeta documentos de la carpeta store y obtenemos su nuevo nombre
        $file = $request->file('document')->store('documents');

        //datos actuales para volver al mismo sitio
        $CursoA= $request->curso_actual;
        $ClaseA= $request->clase_actual;
        $UsuarioA= $request->user_id;
        $SectionA= $request->section_actual;
        $ParcialA= $parcial;
        
        //proceso para cada una de la secciones seleccionadas
        foreach ($secciones as  $seccion) {
            //insertamos los datos en la base de datos en la tabla files
            $msj= DB::table('files')->insert([

                'user_id'=>$request->user_id,
                'course_id'=>$request->select_course_file,
                'section'=>$seccion,
                'clase_id'=>$request->select_clases_file,
                'parcial'=>$parcial,
                'filename'=>$file,
                'name_original'=>$name_original,
                'typefile'=>$extension,
                'detalles'=>$request->descripcion_file,
                'fecha'=>Carbon::now(),
                
            ]);
        }
        
        return redirect('teachers/acumulativos/'.$UsuarioA.'/'.$CursoA.'/'.$SectionA.'/'.$ClaseA.'/'.$ParcialA);
       
    }

     //funcion para recibir los datos del formulario para subir un archivo
     function send_video(Request $request){

        //obtenemos las secciones seleccionadas
        $secciones=$request->input('sections');
        $parcial = $request->select_parcial_video;

        //datos actuales para volver al mismo sitio
        $CursoA= $request->curso_actual;
        $ClaseA= $request->clase_actual;
        $UsuarioA= $request->user_id;
        $SectionA= $request->section_actual;
        $ParcialA= $parcial;
        
        //proceso para cada una de la secciones seleccionadas
        foreach ($secciones as  $seccion) {
            //insertamos los datos en la base de datos en la tabla files
            $msj= DB::table('videos')->insert([

                'user_id'=>$request->user_id,
                'course_id'=>$request->select_course_video,
                'section'=>$seccion,
                'clase_id'=>$request->select_clases_video,
                'parcial'=>$parcial,
                'titulo'=>$request->titulo,
                'url'=>$request->url,
                'detalles'=>$request->descripcion_video,
                'fecha'=>Carbon::now(),
                
            ]);
        }
        
        return redirect('teachers/acumulativos/'.$UsuarioA.'/'.$CursoA.'/'.$SectionA.'/'.$ClaseA.'/'.$ParcialA);       
         
    }

   function delete_task(Request $request){

        //obtemos la seccion del curso y la pasamos a minuscula
        $seccion=strtolower($request->section_id);
        //obtenemos el curso
        $course_id=$request->course_id;
        //nombramos la tabla de tareas de este curso y seccion
        $tbl_task='task_'.$course_id.'_'.$seccion; //nombre de la tabla principal de tareas
        //nombramos la tabla de tareassudent de este curso y seccion
        $tbl_taskstdent='taskstudent_'.$course_id.'_'.$seccion; //nombre de la tabla principal de tareas

        //eliminamos el acumulativo de la tabla principal de tareas de este curso y seccion
        if ($res = DB::table($tbl_task)->where('id', '=', $request->task_id)->delete()){
            //en caso de que si la halla eliminado

            //eliminamos la tarea de las tabla task_student
            $res = DB::table($tbl_taskstdent)->where($tbl_task.'_id', '=', $request->task_id)->delete();
            
        }

   }

    //funcion para eliminar documentos desde el panel acumulativos de docentes
    function delete_file(Request $request){
         //eliminamos el archivo de las tabla files
         $res = DB::table('files')->where('id', '=', $request->file_id)->delete();
    }
    
    //funcion para eliminar videos desde el panel acumulativos de docentes
    function delete_video(Request $request){
         //eliminamos el archivo de las tabla files
         $res = DB::table('videos')->where('id', '=', $request->video_id)->delete();
    }

    //funcion para evaluar los acumulativos
    function evaluar_task(Request $request){
       
        //obtemos la seccion del curso y la pasamos a minuscula
        $seccion=strtolower($request->section_id);
        //obtenemos el curso
        $course_id=$request->course_id;
        //nombramos la tabla de tareas de este curso y seccion
        $tbl_task='task_'.$course_id.'_'.$seccion; //nombre de la tabla principal de tareas
        //nombramos la tabla de tareassudent de este curso y seccion
        $tbl_taskstudent='taskstudent_'.$course_id.'_'.$seccion; //nombre de la tabla principal de tareas

        //obtenemos los datos de esta tarea, titulo y valor
        $tasks= DB::table($tbl_task)->where('id','=',$request->task_id)->get();

        //obtenemos el listados de esrudiantes de este curso y seccion 
        $students = DB::table($tbl_taskstudent)
                    ->join('users', $tbl_taskstudent.'.student', '=', 'users.id')
                    ->Select(
                        'users.id as user',
                        'users.sexo',
                        'users.name',
                        'users.lastname',
                        $tbl_taskstudent.'.id as ts_id',
                        $tbl_taskstudent.'.valor_obtenido',
                        $tbl_taskstudent.'.observacion')
                    ->where($tbl_task.'_id','=',$request->task_id)
                    ->orderBy('users.sexo', 'asc')
                    ->orderBy('users.name', 'asc')
                    ->get();
        
        $id_task=$request->task_id;
        return view('ajax/evaluartask',compact('students','tasks','course_id','seccion','id_task'));
    }

    //funcion para ver las tareas enviadas por los estudiantes
    function ver_filetasks(Request $request){
       
        //obtemos la seccion del curso y la pasamos a minuscula
        $seccion=strtolower($request->section_id);
        //obtenemos el curso
        $course_id=$request->course_id;
       
        //obtenemos los archivos de esta clase , tarea y 
        $file_tasks= DB::table('filetasks')
                        ->join('users', 'filetasks.user_id', '=', 'users.id')
                        ->where([
                            ['filetasks.task_id', '=', $request->task_id],
                            ['filetasks.clase_id', '=', $request->class_id]
                        ])
                        ->get();

        //$id_task=$request->task_id;

        return view('ajax/ver_filetasks',compact('file_tasks','seccion','course_id'));
    }
    

    //funcion para almacenar las notas enviadas desde el panel de docente
    function save_notas(Request $request){
        
        //obtemos la seccion del curso y la pasamos a minuscula
        $seccion=strtolower($request->seccion);
        //obtenemos el curso
        $course=$request->course_id;

        $tbl_task='task_'.$course.'_'.$seccion;

        $tbl_taskstudent='taskstudent_'.$course.'_'.$seccion; //nombre de la tabla principal de tareas
        
        //obtenemos los datos de la tarea , parcial, docente, y clase
        $tarea = DB::table($tbl_task)->where('id','=',$request->task_id)->get();
       
        //datos actuales para volver al mismo sitio
        $CursoA= $course;
        $SectionA= $seccion;
        $ClaseA= $tarea[0]->clase;
        $UsuarioA= $tarea[0]->teacher;
        $ParcialA= $tarea[0]->parcial;
       
        //obtenemos los id de los alumnos matriculados en este curso y seccion y que tiene tarea asignada
        $Enrollments = DB::table($tbl_taskstudent)
                ->join('enrollments', $tbl_taskstudent.'.student', '=', 'enrollments.user_id')
                ->where([
                    ['enrollments.course_id', '=', $course],
                    ['enrollments.section', '=', $seccion],
                    [$tbl_taskstudent.'.'.$tbl_task.'_id', '=', $request->task_id],
                ])
                ->get();
              // dd( $Enrollments);
        //ciclo de inserccion de notas, para cada estudiante
       
        foreach ($Enrollments as $enroll) {

            $id = 'txt_'.$enroll->student;
            $obs = 'obs_'.$enroll->student;
            //insertamos la tarea en la task_student que corresponde al curso y seccion
            $resp =DB::table($tbl_taskstudent)
                ->where([
                    ['student', '=', $enroll->user_id],
                    [$tbl_task.'_id', '=', $request->task_id ],
                ])
                ->update(array(
                    'observacion'=>$request->$obs,
                    'valor_obtenido' =>$request->$id
                ));

                /********ACTUALIZAMOS LA TABLA HISTORIAL*******/
                //nombramos la tabla historial a utilizar
                $tabla='historial_'.$course.'_'.$seccion;

                //obtenemos todas las tareas creadas en esta clase para este estudiante
                $tareas =DB::table($tbl_task)
                ->join($tbl_taskstudent, $tbl_taskstudent.'.'.$tbl_task.'_id', '=', $tbl_task.'.id')
                ->where([
                    [$tbl_task.'.clase', '=', $ClaseA ],
                    [$tbl_taskstudent.'.student', '=', $enroll->user_id ]
                ])->get();
                
                //obtenemos los resultados de 
                /*$tareas_students =DB::table($tbl_taskstudent)
                ->where([
                    ['student', '=', $enroll->user_id]
                ])->get();*/

                $suma_de_nota=0;
                //sumar las notas obtenidas en cada tarea
                foreach ($tareas as $tarea) {
                    $suma_de_nota+=$tarea->valor_obtenido;
                }
                //$old_acum = $resp_old_acum[0]->Acum1;
                //calculamos el nuevo acumulativo
                //$nuevo_Acum = $old_acum + $request->$id;
                $nuevo_Acum =  $suma_de_nota;
               // dd("old_Acum=".$resp_old_acum[0]->Acum1."---VAlor id =".$request->$id."---Nuevo Acum=".$nuevo_Acum);
                
                $resp_historial =DB::table($tabla)
                ->where([
                    ['student_id', '=', $enroll->user_id],
                    [$tabla.'.clase_id', '=', $ClaseA ],
                    ])
                ->update(array(
                    'Acum'.$ParcialA =>$nuevo_Acum
                ) );

                
        }//fin del ciclo para cada alumno de este curso

        /**ACTUALIZAR el estatus de LA TABLA Task, EVALUADA =1 */
        $update=DB::table($tbl_task)
                    ->where('id',  $request->task_id)
                    ->update(['evaluada' => 1]);


        return redirect('teachers/acumulativos/'.$UsuarioA.'/'.$CursoA.'/'.$SectionA.'/'.$ClaseA.'/'.$ParcialA);

    }

    //zona para mostart el listado de alumnos y notas del historial 
    public function examen($user_id,$course,$section,$clase){

         /*************************SEGURIDAD*******************/
            //control de seguridad
            // Get the currently authenticated user...
            if ( !($user = Auth::user()) ){
                return "ACCESO SOLO PARA USUARIOS REGISTRADOS."; 
            }
            
            if( $user->role!='teacher'){
                return ("ÁREA EXCLUSIVA DEL DOCENTE.");
            }

            $id_user_log = Auth::id();
            if( $id_user_log != $user_id){
                return "ACCESO NO PERMITIDO AL USUARIO ACTUAL."; 
            }
        /*************************SEGURIDAD*******************/

         //obtenemos los datos del docente
         $user = User::findOrFail($user_id);

        //obtenemos las asignaciones de este docentes para el menu del lado quierdo togle
        $asignaciones = DB::table('assignments')
                                ->join('courses', 'assignments.course_id', '=', 'courses.id')
                                ->join('clases', 'assignments.clase_id', '=', 'clases.id')
                                ->Select('assignments.user_id','courses.id as course_id','clases.id as clase_id','courses.short_name as course','clases.short_name as clase','assignments.section')
                                ->where('assignments.user_id','=',$user_id)
                                ->get();
        
        $curso_actual=DB::table('courses')
                        ->where('id','=',$course)
                        ->get();
                       
        $clase_actual=DB::table('clases')
                        ->where('id','=',$clase)
                        ->get();
                       
        $section_actual=$section;
        $section = strtolower($section);
        
        //reducimos el nombre de la tabla 
        $tabla= 'historial_'.$course.'_'.$section;
       
        $students = DB::table('enrollments')
                        ->join('users', 'enrollments.user_id', '=', 'users.id')
                        ->join($tabla, $tabla.'.student_id', '=', 'enrollments.user_id')
                        ->where([
                            ['enrollments.section','=',$section],
                            ['enrollments.course_id','=',$course],
                            [$tabla.'.clase_id','=',$clase]
                        ] )
                        ->Select(
                            'users.id as user_id',
                            'users.sexo',
                            'users.name',
                            'users.lastname',
                            'enrollments.course_id',
                            'enrollments.section',
                            $tabla.'.*'
                            )
                        ->orderBy('users.sexo', 'asc')
                        ->orderBy('users.name', 'asc')
                        ->get();
        //dd($students);
       
        return view('teachers/examen',compact(
            'user','clase_actual','curso_actual','section_actual','asignaciones','students'));

    }

    public function cuadrouno($user_id,$course_id,$section,$clase){

            /*************************SEGURIDAD*******************/
            //control de seguridad
            // Get the currently authenticated user...
            if ( !($user = Auth::user()) ){
                return "ACCESO SOLO PARA USUARIOS REGISTRADOS."; 
            }
            
            if( $user->role!='teacher'){
                return ("ÁREA EXCLUSIVA DEL ADMINISTRADOR.");
            }

        /*************************SEGURIDAD*******************/

        $seccion = strtolower($section);
        //nombramos la tabla a utilizar
        $tabla='historial_'.$course_id.'_'.$seccion;

        //obtenemos los id de los estudiantes matriculados en este curso y seccion
        $estudiantes = DB::table($tabla)
                            ->join('users', $tabla.'.student_id', '=', 'users.id')
                            ->join('clases', $tabla.'.clase_id', '=', 'clases.id')
                            ->where ([
                                        [$tabla.'.clase_id', '=', $clase],
                                        ['clases.semester', '!=', 2],
                                    ])
                            ->Select('users.name','users.lastname','users.id as user_id','users.sexo',$tabla.'.*','clases.name as clase')
                            ->orderBy('users.sexo','asc')
                            ->orderBy('users.name','asc')
                            ->get(); 
                            //dd($estudiantes);

            $course =  Course::findOrFail($course_id);
            $seccion = strtolower($section);
            
        return view('teachers/cuadrouno',compact('estudiantes','curso','seccion','clases','course','section'));
    }

    //funcion para almacenar/actualizat las notas ingresadas en la seccion de examen del docente, para cerrar nota final de parcial
    public function save_parcial(Request $request){

        //obtenemos el curso
        $course=$request->course_id;
        
        //obtemos la seccion del curso y la pasamos a minuscula
        $section=$request->seccion;
      
        $seccion=strtolower($section);
        //obtenemos la clase
        $clase=$request->clase_id;
        
        //nombramos la tabla a utilizar
        $tabla='historial_'.$course.'_'.$seccion;
        
        //buscamos el curso para er si es semestral
        $curso=DB::table('courses')
                    ->where('id','=',$course)
                    ->get();

        //obtenemos los id de los estudiantes de este curso y seccion
        $students = DB::table('enrollments')
                    ->where([
                        ['enrollments.section','=',$section],
                        ['enrollments.course_id','=',$course],
                    ] )
                    ->Select('enrollments.user_id')
                    ->get();
        //proceso para los cursos NO semestrales
        if($curso[0]->is_semestral==0){

            //proceso para cada uno de los estudiantes
            foreach ($students as $student) {

                $txtacum1= 'acum1_'. $student->user_id;
                $txtacum2= 'acum2_'. $student->user_id;
                $txtacum3= 'acum3_'. $student->user_id;
                $txtacum4= 'acum4_'. $student->user_id;
                $txtexa1= 'exa1_'. $student->user_id;
                $txtexa2= 'exa2_'. $student->user_id;
                $txtexa3= 'exa3_'. $student->user_id;
                $txtexa4= 'exa4_'. $student->user_id;
                $promedio= 'promedio_'. $student->user_id;
                $recu= 'recu_'. $student->user_id;
                //$recu2= 'recu2_'. $student->user_id;
            
            //actualizamos cada valor
            $resp =DB::table($tabla)
                        ->where([
                            ['student_id', '=', $student->user_id],
                            [$tabla.'.clase_id', '=', $clase ],
                            ])
                        ->update(array(
                            'Acum1'=>$request->$txtacum1,
                            'Exa1' =>$request->$txtexa1,
                            'Acum2'=>$request->$txtacum2,
                            'Exa2' =>$request->$txtexa2,
                            'Acum3'=>$request->$txtacum3,
                            'Exa3' =>$request->$txtexa3,
                            'Acum4'=>$request->$txtacum4,
                            'Exa4' =>$request->$txtexa4,
                            'Promedio'=>$request->$promedio,
                            'Recu1' =>$request->$recu
                            //'Recu2'=>$request->recu2,
                            
                        ) );
            }// fin del foreach 

        }// findel if para los NO semestrales

        //proceso para los cursos SI semestrales
        if($curso[0]->is_semestral==1){

            //proceso para cada uno de los estudiantes
            foreach ($students as $student) {

                $txtacum1= 'acum1_'. $student->user_id;
                $txtacum2= 'acum2_'. $student->user_id;
              
                $txtexa1= 'exa1_'. $student->user_id;
                $txtexa2= 'exa2_'. $student->user_id;
              
                $promedio= 'promedio_'. $student->user_id;
                $recu= 'recu_'. $student->user_id;
                //$recu2= 'recu2_'. $student->user_id;
            
            //actualizamos cada valor
                $resp =DB::table($tabla)
                            ->where([
                                ['student_id', '=', $student->user_id],
                                [$tabla.'.clase_id', '=', $clase ],
                                ])
                            ->update(array(
                                'Acum3'=>$request->$txtacum1,
                                'Exa3' =>$request->$txtexa1,
                                'Acum4'=>$request->$txtacum2,
                                'Exa4' =>$request->$txtexa2,
                               
                                'Promedio'=>$request->$promedio,
                                'Recu1' =>$request->$recu
                                //'Recu2'=>$request->recu2,
                                
                            ) );
            }// fin del foreach 
        }// findel if para los SI semestrales


        
        
       return redirect('teachers/academia/'.$request->user_id);

    }

    //funcion para ver el formulario de Editar los acumulativos
    function editar_task(Request $request){
       
        //obtemos la seccion del curso y la pasamos a minuscula
        $seccion=strtolower($request->section_id);
        //obtenemos el curso
        $course_id=$request->course_id;
        //nombramos la tabla de tareas de este curso y seccion
        $tbl_task='task_'.$course_id.'_'.$seccion; //nombre de la tabla principal de tareas
        //obtenemos los datos de esta tarea, titulo y valor
        $tasks= DB::table($tbl_task)->where('id','=',$request->task_id)->get();
        
        $id_task=$request->task_id;
        return view('ajax/editartask',compact('tasks','course_id','seccion','id_task'));
    }

    
    //funcion para salvar la edicion de la tarea
    function save_editar_tarea(Request $request){
        
        //obtemos la seccion del curso y la pasamos a minuscula
        $seccion=strtolower($request->seccion);
        //obtenemos el curso
        $course=$request->course_id;
        //nombramos la tabla de tareas
        $tbl_task='task_'.$course.'_'.$seccion;
        //obtenemos los datos de la tarea , parcial, docente, y clase
        $tarea = DB::table($tbl_task)->where('id','=',$request->task_id)->get();

        //datos actuales para volver al mismo sitio
        $CursoA= $course;
        $SectionA= $seccion;
        $ClaseA= $tarea[0]->clase;
        $UsuarioA= $tarea[0]->teacher;
        $ParcialA= $tarea[0]->parcial;
        //dd($request);
        //actualizamos la tarea en la tabla correspondiente
        $update=DB::table($tbl_task)
            ->where('id',  $request->task_id)
            ->update(array(
                'titulo'=>$request->titulo,
                'descripcion' =>$request->descripcion,
                'valor'=>$request->valor,
                'tipo'=>$request->select_tipo,
                'parcial'=>$request->select_parcial,
                'fecha_entrega'=>$request->date_acum
            ));

        return redirect('teachers/acumulativos/'.$UsuarioA.'/'.$CursoA.'/'.$SectionA.'/'.$ClaseA.'/'.$ParcialA);

    }
}