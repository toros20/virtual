<?php

namespace App\Http\Controllers;

use App\User;
use App\Enrollment;
use App\Course;
use App\Clasecourse;
use App\Assignment;
use App\Clase;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class StudentController extends Controller
{

    public function students_panel($id){

       /*************************SEGURIDAD*******************/
            //control de seguridad
            // Get the currently authenticated user...
            if ( !($user = Auth::user()) ){
                return "ACCESO SOLO PARA USUARIOS REGISTRADOS."; 
            }
            
            if( $user->role!='student'){
                return response("ÁREA EXCLUSIVA DEL ESTUDIANTE.",404);
            }

            $id_user_log = Auth::id();
            if( $id_user_log != $id){
                return "ACCESO NO PERMITIDO AL USUARIO ACTUAL."; 
            }
        /*************************SEGURIDAD*******************/

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
        
        //obtenemos los primeros 10 mensajes de este usuario        
        $mensajes = DB::table('msj_'.$id)
                        ->join('users', 'msj_'.$id.'.remitente', '=', 'users.id')
                        ->limit(500)
                        ->orderBy('msj_'.$id.'.id', 'desc')
                        ->Select(
                            'msj_'.$id.'.id as msj_id',
                            'msj_'.$id.'.remitente', 
                            'msj_'.$id.'.mensaje',
                            'msj_'.$id.'.fecha',
                            'msj_'.$id.'.tipo',
                            'msj_'.$id.'.key',
                            'msj_'.$id.'.comentarios',
                            'users.name','users.lastname','users.role','users.sexo' )
                        ->get();

        $tbl_tareashoy = 'task_'.$enroll[0]->course_id.'_'.strtolower($enroll[0]->section)
        //obtenemos las tareas para el panel derecho de tareas
        $tareas_hoy = DB::table($tbl_tareashoy)
                                ->join('clases', 'clases.id', '=' , $tbl_tareashoy.'clase' )
                                ->join('users', 'users.id', '=' , $tbl_tareashoy.'teacher' )
                                ->where([
                                    ['users.role', '=', 'teacher'],
                                    ['clases.semester', '!=', 2],
                                    [$tbl_tareashoy.'.fecha_entrega', '=', Date.now()],
                                ])
                                ->orderBy($tbl_tareashoy.'.fecha_publicada')
                                ->Select(
                                    $tbl_tareashoy.'titulo',
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
        return view('students/panel',compact('user','course','enroll','clases','asignaciones','mensajes','tareas_hoy'));
        
    }

    //funcino para mostrar el panel academico del estudiante, se muestan las tarjetas de clases 
     function academia($user_id){
       /*************************SEGURIDAD*******************/
            //control de seguridad
            // Get the currently authenticated user...
            if ( !($user = Auth::user()) ){
                return "ACCESO SOLO PARA USUARIOS REGISTRADOS."; 
            }
            
            if( $user->role!='student'){
                return ("ÁREA EXCLUSIVA DEL ESTUDIANTE.");
            }

            $id_user_log = Auth::id();
            if( $id_user_log != $user_id){
                return "ACCESO NO PERMITIDO AL USUARIO ACTUAL."; 
            }
        /*************************SEGURIDAD*******************/


         //obtenemos los datos del estudiante
         $user = User::findOrFail($user_id);
         //obtenemos los datos de su matricula
         $enroll = Enrollment::where('user_id',$user_id)->get();
         //obtenemos las asignaciones de este docentes
         $asignaciones = DB::table('clasecourses')
                        ->join('courses', 'clasecourses.course_id', '=', 'courses.id')
                        ->join('clases', 'clasecourses.clase_id', '=', 'clases.id')
                        ->Select('courses.id as course_id','courses.is_semestral','clases.id as clase_id','courses.short_name as course','clases.short_name as clase')
                        ->where('clasecourses.course_id', '=', $enroll[0]->course_id)
                        ->get();
                       // dd($asignaciones);

        return view('students/academia',compact('user','asignaciones','enroll'));
    }

    //funcion para la seccion de cada clase, mostraremos acumulativos y documentos por parcial
     function acumulativos($user_id,$clase,$parcial){

         /*************************SEGURIDAD*******************/
            //control de seguridad
            // Get the currently authenticated user...
            if ( !($user = Auth::user()) ){
                return "ACCESO SOLO PARA USUARIOS REGISTRADOS."; 
            }
            
            if( $user->role!='student'){
                return ("ÁREA EXCLUSIVA DEL ESTUDIANTE.");
            }

            $id_user_log = Auth::id();
            if( $id_user_log != $user_id){
                return "ACCESO NO PERMITIDO AL USUARIO ACTUAL."; 
            }
        /*************************SEGURIDAD*******************/

         //obtenemos los datos del student
         $user = User::findOrFail($user_id);
        
         //obtenemos los datos de su matricula
         $enroll = Enrollment::where('user_id',$user_id)->get();
         $course=$enroll[0]->course_id;
         $section=strtolower($enroll[0]->section);

         //clases para mostrar en el panel de navegacion del lado derecho

         //codigo para ver las clases del primer semestre
         /*$clases = DB::table('clasecourses')
                        ->join('clases', 'clasecourses.clase_id', '=', 'clases.id')
                        ->Select('clases.id as clase_id','clases.short_name as clase')
                        ->where('clasecourses.course_id', '=', $enroll[0]->course_id)
                        ->get();*/
        
        //codigo para ver las clases del Primer semestre
        $clases = DB::table('clasecourses')
                    ->join('clases', 'clasecourses.clase_id', '=', 'clases.id')
                    ->Select('clases.id as clase_id','clases.short_name as clase')
                    ->where([
                        ['clasecourses.course_id', '=', $enroll[0]->course_id],
                        ['clases.semester', '!=', 2]
                    ])
                    ->get();

        //tabla individual de tareas para evaluar
        $tbl_taskstudent='taskstudent_'.$course.'_'.$section;//nombre de la tabla a buscar
        //tabla global de tareas
        $tbl_task='task_'.$course.'_'.$section;//nombre de la tabla a buscar

        //buscamos las tares de este esudiante por el parcial y clase del url
        $tasks = DB::table($tbl_taskstudent)
                    ->join($tbl_task, $tbl_taskstudent.'.'.$tbl_task.'_id', '=', $tbl_task.'.id')
                    ->where([
                        ['student', '=', $user_id],
                        ['parcial', '=', $parcial],
                        ['clase', '=', $clase]
                    ])
                    ->orderBy($tbl_taskstudent.'.id','ASC')
                    ->get();
        //obtenemos los documentos subidos por este docente a este cursos secion y clase
        $files = DB::table('files')
                ->where([
                        ['clase_id', '=', $clase],
                        ['course_id', '=', $course],
                        ['section', '=', $section],
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
                            ['parcial', '=', $parcial]
                            
                            ])
                    ->orderBy('id','ASC')
                    ->get();

        //dd($tasks);
        $claseActual = $clase;
        /*$NomClase = DB::table('clases')
                    ->where([
                        ['id', '=', $clase]
                    ])->get();*/

        $NomClase = Clase::where('id',$clase)->get();
        $nombre_clase = $NomClase[0]->short_name;

        return view('students/acumulativos',compact('user','tasks','clases','claseActual','nombre_clase','parcial','files','videos'));

    }

     //funcion para recibir los datos del formulario para subir un archivo
     function send_file(Request $request){

        //obtenemos las secciones seleccionadas
        //$secciones=$request->input('sections');
        $parcial = $request->parcial;
        
        $enroll = Enrollment::where('user_id',$request->user_id)->get();
        $course=$enroll[0]->course_id;
        $section=strtolower($enroll[0]->section);

        //obtenemos el nombre original del archivo
        $name_original = $request->file('document')->getClientOriginalName();

        //obtenemos la extension original del archivo
        $extension = $request->file('document')->getClientOriginalExtension();

        //almacenamos el documento en la carpeta tasks de la carpeta store y obtenemos su nuevo nombre
        $file = $request->file('document')->store('tasks');
        
        //datos actuales para volver al mismo sitio
        //$CursoA= $request->curso_actual;
        $ClaseA= $request->clase_actual;
        $UsuarioA= $request->user_id;
        //$SectionA= $request->section_actual;
        $ParcialA= $parcial;
        
        
        //insertamos los datos en la base de datos en la tabla files
        $msj= DB::table('filetasks')->insert([

            'user_id'=>$request->user_id,
            'course_id'=>$course,
            'section'=>$section,
            'clase_id'=>$request->clase_actual,
            'task_id'=>$request->task,
            'parcial'=>$parcial,
            'filename'=>$file,
            'name_original'=>$name_original,
            'typefile'=>$extension,
            'detalles'=>$request->descripcion,
            'fecha'=>Carbon::now(),
            
        ]);

        
        return redirect('students/acumulativos/'.$UsuarioA.'/'.$ClaseA.'/'.$ParcialA);
       
    }


    //funcion para mostrar acumulativos y documentos por parcial despues de seleccionar (filtrar) una clase 
    function acumulativosbyclass(Request $request){

        $user_id=$request->_student;
        $clase=$request->_clase_id;
        $parcial=$request->_parcial;
        //obtenemos los datos del student
        $user = User::findOrFail($user_id);

        //obtenemos los datos de su matricula
        $enroll = Enrollment::where('user_id',$user_id)->get();
        $course=$enroll[0]->course_id;
        $section=strtolower($enroll[0]->section);

        //buscamos el nombre de la clase seleccionada
        $clases = DB::table('clases')
                    ->Select('clases.short_name as clase')
                    ->where('id', '=',$clase)
                    ->get();

        //tabla individual de tareas para evaluar
        $tbl_taskstudent='taskstudent_'.$course.'_'.$section;//nombre de la tabla a buscar
        //tabla global de tareas
        $tbl_task='task_'.$course.'_'.$section;//nombre de la tabla a buscar

        //buscamos las tares de este esudiante por el parcial y clase seleccionada
        $tasks = DB::table($tbl_taskstudent)
                    ->join($tbl_task, $tbl_taskstudent.'.'.$tbl_task.'_id', '=', $tbl_task.'.id')
                    ->where([
                        ['student', '=', $user_id],
                        ['parcial', '=', $parcial],
                        ['clase','=',$clase]
                    ])
                    ->orderBy($tbl_taskstudent.'.id','ASC')
                    ->get();

          //obtenemos los documentos subidos por este docente a este cursos secion y clase
          $files = DB::table('files')
                    ->where([
                            ['clase_id', '=', $clase],
                            ['course_id', '=', $course],
                            ['section', '=', $section],
                            ['parcial', '=', $parcial],
                            ])
                    ->orderBy('id','ASC')
                    ->get();
            //dd($files);
            //obtenemos los videos subidos por este docente a este cursos secion y clase
            $videos = DB::table('videos')
                        ->where([
                                ['clase_id', '=', $clase],
                                ['course_id', '=', $course],
                                ['section', '=', $section],
                                ['parcial', '=', $parcial],
                                ])
                        ->orderBy('id','ASC')
                        ->get();

        
        return view('ajax/acumulativosbyclass',compact('user','tasks','clases','parcial','files','videos'));

    }

    //funcion para mostar el area de excelencia academica
    function excelencia(){

        $excelencias = DB::table('excelencias')
                ->join('users', 'excelencias.cuenta', '=', 'users.cuenta')
                ->Select('excelencias.*','users.name','users.lastname','users.sexo')
                ->where([
                    ['users.role', '=', 'student']
                ])
                ->limit(8)
                ->get();
        return view('students/excelencia',compact('excelencias'));
    }

    //funcion para mostar el area de excelencia academica por curso y seccion
    function excelencias_by_id($course_id,$section){

        $course = Course::where('id',$course_id)->get();

        $excelencias = DB::table('excelencias')
                ->join('users', 'excelencias.cuenta', '=', 'users.cuenta')
                ->join('enrollments', 'users.id', '=', 'enrollments.user_id')
                ->Select('excelencias.*','users.name','users.lastname','users.sexo')
                ->where([
                    ['users.role', '=', 'student'],
                    ['enrollments.course_id', '=', $course_id ],
                    ['enrollments.section', '=', $section]
                ])
                ->get();
               // dd($course);
        return view('students/excelencias_by_id',compact('excelencias','course','section'));


    }

}