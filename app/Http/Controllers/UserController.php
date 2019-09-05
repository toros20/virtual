<?php

namespace App\Http\Controllers;

use DB;
 
use App\User;
use App\Modality;
use App\Course;
use App\Clase;
use App\Enrollment;
use App\Assignment;
use App\Sectioncourse;
use App\Clasecourse;
use PDF;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserController extends Controller
{
     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         /*************************SEGURIDAD*******************/
            //control de seguridad
            // Get the currently authenticated user...
            if ( !($user = Auth::user()) ){
                return "ACCESO SOLO PARA USUARIOS REGISTRADOS."; 
            }
            
            if( $user->role!='admin'){
                return ("ÁREA EXCLUSIVA DEL ADMINISTRADOR.");
            }

        /*************************SEGURIDAD*******************/
        //$users = DB::table('users')->get();
        $users = User::all();
        return view('users.index',compact('users'));
    }

    public function tablas( $course,$section){
       
        //funcion para sumar los aumulativos a la tabla de historial, se requiere como parametro, curso ,section 
        //obtenemos lo estudiantes de este curso y seccion

        //solo para el tercer parcial
       //$parcial=3;
         /* obtenemos los id de los estudiantes de este curso y seccion*/
        /*$users = Enrollment::where([
            ['course_id', '=', $course],
            ['section', '=', $section],
        ])->Select('user_id')->get();
        
        //obtenemos las clases que tiene asignado este curso
        //VERSION1.   $clases = Clasecourse::where('course_id', '=', $course)->Select('clase_id')->get();

        $clases = Clasecourse::where([
            ['course_id', '=', $course],
            ['clase_id', '>', 100],
        ])->Select('clase_id')->get();
       
        //nombramos las tablas que utiliizaremos
        $tabla_historial='historial_'.$course.'_'.strtolower($section);
        $tabla_tareas='task_'.$course.'_'.strtolower($section);
        $tabla_student_tareas='taskstudent_'.$course.'_'.strtolower($section);
        
        foreach ($users as $user) {//comienza el ciclo para cada estudiante
            foreach ($clases as $clase) {// comienza el ciclo para cada clase de esste estudiante
               // dd( 'clase='.$clase.' parical='.$parcial. ' usuario='.$user->user_id);
                //obtener la suma de las tareas del parcial
                $tareas = DB::table($tabla_student_tareas)
                            ->join($tabla_tareas, $tabla_tareas.'.id', '=', $tabla_student_tareas.'.'.$tabla_tareas.'_id')
                            ->where([
                                [$tabla_tareas.'.clase', '=', $clase->clase_id],
                                [$tabla_tareas.'.parcial', '=', $parcial],
                                [$tabla_student_tareas.'.student', '=', $user->user_id],
                            ])
                            ->get();
                $total=0;
                //ahora sumaremos todas las tareas
                foreach ($tareas as $tarea) {
                    //obtenemos la suma de las tareas de esta clase parcial y estudiante
                   $total += $tarea->valor_obtenido;
             
                    //actualizamos la tabla historial con los datos sumados
                    $resp =DB::table($tabla_historial)
                                ->where([
                                    [$tabla_historial.'.student_id', '=', $user->user_id],
                                    [$tabla_historial.'.clase_id', '=',$clase->clase_id ]
                                ])
                                ->update(array(
                                    'Acum3'=>$total
                                    ) );

                }
                
            }
         }

         return "LISTO LAS SUMAS";*/
        
        
        
        
         //codigo para insertar filas en la tabla historial, por cada curso y section, 
         //se requiere como para metros course, section
        /*$clases = Clasecourse::where('course_id', '=', $course)->Select('clase_id')->get();*/
         
      /*  $clases = Clasecourse::where([
            ['course_id', '=', $course],
            ['clase_id', '>', 188],
        ])->Select('clase_id')->get();

        $users = Enrollment::where([
            ['course_id', '=', $course],
            ['section', '=', $section],
        ])->Select('user_id')->get();

        foreach ($users as $user) {
           foreach ($clases as $clase) {
                DB::table('historial_'.$course.'_'.strtolower($section))->insert([
                    'student_id'=>$user->user_id,
                    'clase_id'=>$clase->clase_id,
                ]);
           }
        }
        
        return "LISTO---Filas Insertadas";*/


        
         //codigo para insertar filas en la tabla encuestas, por cada curso y section, 
         //se requiere como para metros course, section
       
        /*$docentes = DB::table('assignments')
        ->join('users', 'assignments.user_id', '=', 'users.id')
        ->where([
            ['assignments.course_id', '=', $course],
            ['assignments.section', '=', $section]
        ])
        ->Select('users.id as docente','name','lastname')->distinct()->get();


        $estudiantes = Enrollment::where([
            ['course_id', '=', $course],
            ['section', '=', $section],
        ])->Select('user_id as estudiante')->get();

        foreach ($estudiantes as $estudiante) {
            foreach ($docentes as $docente) {
                DB::table('encuestas')->insert([
                    'estudiante'=>$estudiante->estudiante,
                    'docente'=>$docente->docente,
                    'p1'=>0,'p2'=>0,'p3'=>0,'p4'=>0,'p5'=>0,'p6'=>0,'p7'=>0,'p8'=>0,'p9'=>0,'p10'=>0
                                    
                ]);
            }
        }
        
        return "LISTO---Filas para encuestas Insertadas";*/




        //codigo para crear la table msj_ por cada user
        /*for ($i=64; $i < 1437  ; $i++) { 
          
            Schema::connection('mysql')->create( 'msj_'.$i, function($table) 
            {
                $table->increments('id');
                $table->integer('remitente');
                $table->text( 'mensaje');
                $table->dateTime('fecha');
                $table->string('tipo');
                $table->string('key',20);
                $table->integer('curso_id');
                $table->char('section',1);
                $table->tinyInteger('visto')->nullable($value = true)->default(0);
                $table->integer('megusta')->nullable($value = true)->default(0);
                $table->tinyInteger('tegusta')->nullable($value = true)->default(0);
                $table->integer('comentarios')->nullable($value = true)->default(0);
    
                $table->timestamps();
            }); 
        }

        return "LISTO";*/
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_estudiante()
    {
         /*************************SEGURIDAD*******************/
            //control de seguridad
            // Get the currently authenticated user...
            if ( !($user = Auth::user()) ){
                return "ACCESO SOLO PARA USUARIOS REGISTRADOS."; 
            }
            
            if( $user->role!='admin'){
                return ("ÁREA EXCLUSIVA DEL ADMINISTRADOR.");
            }

        /*************************SEGURIDAD*******************/

        $modalities = Modality::all();
        $courses = Course::all();
        return view('users.create_estudiante',compact('modalities','courses'));
    }

    public function create_teacher()
    {
         /*************************SEGURIDAD*******************/
            //control de seguridad
            // Get the currently authenticated user...
            if ( !($user = Auth::user()) ){
                return "ACCESO SOLO PARA USUARIOS REGISTRADOS."; 
            }
            
            if( $user->role!='admin'){
                return ("ÁREA EXCLUSIVA DEL ADMINISTRADOR.");
            }

        /*************************SEGURIDAD*******************/
        return view('users.create_teacher');
    }

    public function students()
    {
         /*************************SEGURIDAD*******************/
            //control de seguridad
            // Get the currently authenticated user...
            if ( !($user = Auth::user()) ){
                return "ACCESO SOLO PARA USUARIOS REGISTRADOS."; 
            }
            
            if( $user->role!='admin'){
                return ("ÁREA EXCLUSIVA DEL ADMINISTRADOR.");
            }

        /*************************SEGURIDAD*******************/
        //selecciomos todos los usuarios del tipo student
        //$students = DB::table('users')->where('role','student')->get();
        $students = User::where('role','student')->get();
        return view('users.students',compact('students'));

    }

    public function teachers()
    {
         /*************************SEGURIDAD*******************/
            //control de seguridad
            // Get the currently authenticated user...
            if ( !($user = Auth::user()) ){
                return "ACCESO SOLO PARA USUARIOS REGISTRADOS."; 
            }
            
            if( $user->role!='admin'){
                return ("ÁREA EXCLUSIVA DEL ADMINISTRADOR.");
            }

        /*************************SEGURIDAD*******************/
        //selecciomos todos los usuarios del tipo student
        //$students = DB::table('users')->where('role','student')->get();
        $teachers = User::where('role','teacher')->get();
        return view('users.teachers',compact('teachers'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $tbl_mensajes='';//nombre de la tabla en la cual se guardaran sus msj, solo la inicializamos
        //Codigo para insertar student
        if ($request->input('role')=='student') {
            
            //insertamos el nuevo usuario student, de ingresarse correctamente 
            //ingresamos los datos de enrollments
            if( $user=User::create($request->all()) ){

                //id del usuario recien creado
                $new_id= $user->id;
                //nombre de la tabla donde se almacenaran sus mensajes
                $tbl_mensajes='msj_'. $new_id;

                //obtenemos año actual
                $now = new \DateTime();
                $year = $now->format('Y');

                //obtenemos el id del curso seleccionado
                $course_id=$request->input('course_id');
                $section=$request->input('section');

                DB::table('enrollments')->insert([

                    'user_id'=>$new_id,
                    'year'=>$year,
                    'course_id'=>$course_id,
                    'section'=>$section,
                    'created_at'=> Carbon::now(),
                    'updated_at'=> Carbon::now()
                ]);

                //creamos la tabla msj de este usuario (ejemplo msj_1 (id) )
                Schema::connection('mysql')->create( $tbl_mensajes, function($table) 
                {
                    $table->increments('id');
                    $table->integer('remitente');
                    $table->text( 'mensaje');
                    $table->dateTime('fecha');
                    $table->string('tipo');
                    $table->string('key',20);
                    $table->integer('curso_id');
                    $table->char('section',1);
                    $table->tinyInteger('visto')->nullable($value = true)->default(0);
                    $table->integer('megusta')->nullable($value = true)->default(0);
                    $table->tinyInteger('tegusta')->nullable($value = true)->default(0);
                    $table->integer('comentarios')->nullable($value = true)->default(0);

                    $table->timestamps();
                });

                return redirect()->route('users.students');

            }
        }

        //Codigo para insertar employees
        if ($request->input('role')=='teacher') {
            
            if ($user=User::create($request->all()) ){// en caso de insertar el docente

                //id del usuario recien creado
                $new_id= $user->id;

                //nombre de la tabla donde se almacenaran sus mensajes
                $tbl_mensajes='msj_'. $new_id;

                //creamos la tabla msj de este usuario (ejemplo msj_1 (id) )
                Schema::connection('mysql')->create( $tbl_mensajes, function($table) 
                {
                    $table->increments('id');
                    $table->integer('remitente');
                    $table->text( 'mensaje');
                    $table->dateTime('fecha');
                    $table->string('tipo');
                    $table->string('key',20);
                    $table->integer('curso_id');
                    $table->char('section',1);
                    $table->tinyInteger('visto')->nullable($value = true)->default(0);
                    $table->integer('megusta')->nullable($value = true)->default(0);
                    $table->tinyInteger('tegusta')->nullable($value = true)->default(0);
                    $table->integer('comentarios')->nullable($value = true)->default(0);

                    $table->timestamps();
                });
            }// din del if de insertar nuevo docente
            

            return redirect()->route('users.teachers');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         /*************************SEGURIDAD*******************/
            //control de seguridad
            // Get the currently authenticated user...
            if ( !($user = Auth::user()) ){
                return "ACCESO SOLO PARA USUARIOS REGISTRADOS."; 
            }
            
            if( $user->role!='admin'){
                return ("ÁREA EXCLUSIVA DEL ADMINISTRADOR.");
            }

        /*************************SEGURIDAD*******************/
        //$user=DB::table('users')->where('id',$id)->first();
       // return view('users.show',compact('user'));

       $user = User::findOrFail($id);
       return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         /*************************SEGURIDAD*******************/
            //control de seguridad
            // Get the currently authenticated user...
            if ( !($user = Auth::user()) ){
                return "ACCESO SOLO PARA USUARIOS REGISTRADOS."; 
            }
            
            if( $user->role!='admin'){
                return ("ÁREA EXCLUSIVA DEL ADMINISTRADOR.");
            }

        /*************************SEGURIDAD*******************/
        $user = User::findOrFail($id);
       return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         /*************************SEGURIDAD*******************/
            //control de seguridad
            // Get the currently authenticated user...
            if ( !($user = Auth::user()) ){
                return "ACCESO SOLO PARA USUARIOS REGISTRADOS."; 
            }
            
            if( $user->role!='admin'){
                return ("ÁREA EXCLUSIVA DEL ADMINISTRADOR.");
            }

        /*************************SEGURIDAD*******************/

        $user = User::findOrFail($id)->update($request->all());
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*DB::table('users')->where('id',$id)->delete();*/
        $user = User::findOrFail($id)->delete();
        return redirect()->route('users.index');
    }

       /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function password_edit($user_id)
    {
        /*************************SEGURIDAD*******************/
            //control de seguridad
            // Get the currently authenticated user...
            if ( !($user = Auth::user()) ){
                return "ACCESO SOLO PARA USUARIOS REGISTRADOS."; 
            }
            
            if( $user->role!='admin'){
                return ("ÁREA EXCLUSIVA DEL ADMINISTRADOR.");
            }

        /*************************SEGURIDAD*******************/
        $user = User::findOrFail($user_id);
       return view('users.password_edit',compact('user'));
    }

       /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function password_update(Request $request, $user_id)
    {
        /*************************SEGURIDAD*******************/
            //control de seguridad
            // Get the currently authenticated user...
            if ( !($user = Auth::user()) ){
                return "ACCESO SOLO PARA USUARIOS REGISTRADOS."; 
            }
            
            if( $user->role!='admin'){
                return ("ÁREA EXCLUSIVA DEL ADMINISTRADOR.");
            }

        /*************************SEGURIDAD*******************/

        $nueva_clave = $request->password;
        $update=DB::table('users')
                    ->where('id', $user_id)
                    ->update(['password' =>  bcrypt($nueva_clave)]);
     
        $teachers = User::where('role','teacher')->get();
        return view('users.teachers',compact('teachers'));
    }

    /********************FUNCIONES AJAX****************** */

    //funcion para retornar los cursos segun una modalidad seleccionada
    /*function coursesbymodalityid(Request $request){
       $id=$request->modality->id;
       $courses = Course::where('id',$id)->get();
       return view('users/ajax/coursesbymodalityid',compact('courses'));
    }*/

    public function coursesbymodalityid(Request $request){
        
        $id=$request->modality_id;
        $courses = Course::where('modality_id',$id)->get();
        return view('ajax/coursesbymodalityid',compact('courses'));
        
    }

     public function sectionsbycoursesid(Request $request){
        
        $id=$request->course_id;
        $sections = Sectioncourse::where('course_id',$id)->get();
        return view('ajax/sectionsbycoursesid',compact('sections'));
        
     }

     public function clasesbycoursesid(Request $request){
        
        $id=$request->course_id;
        $clasescourses = Clasecourse::where('course_id',$id)->get();
        return view('ajax/clasesbycoursesid',compact('clasescourses'));
        
     }

     public function clasesbymodalityid(Request $request){
        
        $id=$request->modality_id;
        $clases = Clase::where('modality_id',$id)->get();
        return view('ajax/clasesbymodalityid',compact('clases'));
        
     }
    
     // realizar una publicacion del tipo section (solo para los miembros de una seccion) desde el panel de docente, en la caja de comentarios inicial
     public function post_in_section(Request $request){

        //generamos un codigo identificador (tamaño 10) aleatorio para el mensaje
        $key = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
        $max = strlen($pattern)-1;
        for($i=0; $i < 12 ;$i++) $key .= $pattern{mt_rand(0,$max)};

        //obtenemos los id de los usuarios estudiantes matriculados en este curso y seccion
        $id_users = Enrollment::where([
            ['course_id', '=', $request->curso_id],
            ['section', '=', $request->seccion_id],
        ])->Select('user_id')->get();
        
        //recorremos todos los usuarios encontrados y les eviamos el mensaje
        foreach($id_users as $id_user)
        {
            $msj= DB::table('msj_'.$id_user->user_id)->insert([

                'remitente'=>$request->user_id,
                'mensaje'=>$request->mensaje,
                'fecha'=>Carbon::now(),
                'tipo'=>"seccion",
                'curso_id'=>$request->curso_id,
                'section'=>$request->seccion_id,
                'key'=>$key
                
            ]);

            //obtener el email asignado a este usuario

            //enviar el mensaje por correo electronico
        }

        //obtenemos los id de los usuarios maestros asignados en este curso y seccion
        $id_users2 = Assignment::where([
            ['course_id', '=', $request->curso_id],
            ['section', '=', $request->seccion_id],
        ])->Select('user_id')->distinct()->get();

        //recorremos todos los usuarios encontrados y les eviamos el mensaje
        foreach($id_users2 as $id_user2)
        {
            $msj= DB::table('msj_'.$id_user2->user_id)->insert([

                'remitente'=>$request->user_id,
                'mensaje'=>$request->mensaje,
                'fecha'=>Carbon::now(),
                'curso_id'=>$request->curso_id,
                'section'=>$request->seccion_id,
                'tipo'=>"seccion",
                'key'=>$key
                
            ]);
        }

        //obtenemos el id del mensaje recien guardado
        $id = DB::table('msj_'.$request->user_id)->max('id');
       //obtenemos el mensaje recien almacenado
        $mensaje = DB::table('msj_'.$request->user_id)
                        ->join('users', 'msj_'.$request->user_id.'.remitente', '=', 'users.id')
                        ->where('msj_'.$request->user_id.'.id',$id)
                        ->get();
        //enviamos el mensaje recien almacenado,para que aparezca
        return view('ajax/post_in_section',compact('mensaje'));
        
     }

     public function filtrar_msj_byteacher(Request $request){
         //obtenemos los ultimos 20 mensajes enviados por este docente
        $mensajes = DB::table('msj_'.$request->user_id)
                        ->join('users', 'msj_'.$request->user_id.'.remitente', '=', 'users.id')
                        ->where('msj_'.$request->user_id.'.remitente',$request->remitente)
                        ->limit(20)
                        ->get();
                        
        return view('ajax/filtrar_msj_byteacher',compact('mensajes'));
    }

    public function div_comentar(Request $request){
        
        $key_msj=$request->key;
        $curso=$request->curso;
        $seccion=$request->seccion;
        $user=$request->usuario;

        $role = DB::table('users')->where('id',$user)->Select('role')->get();

        return view('ajax/div_comentar',compact('key_msj','curso','seccion','user','role'));
        
     }


    
     public function enviar_comentario(Request $request){

        $key=$request->key_msj;
        $curso=$request->curso;
        $seccion=$request->seccion;
        $user=$request->usuario;
        $texto=$request->comentario;

        $section = strtolower($seccion);

        //usamos una variable para reducir el nombre de la tabla
        $tbl_comentarios = 'comentarios_'.$curso.'_'. $section;

        //insertamos el comentario en la tabla que corrsponde a ese curso y seccion
        $msj= DB::table($tbl_comentarios)->insert([

            'user_id'=>$user,
            'msj_key'=>$key,
            'fecha'=>Carbon::now(),
            'comentario'=>$texto,
            
        ]);

        
        //obtenemos los id de los usuarios estudiantes matriculados en este curso y seccion
        $id_users = Enrollment::where([
                                ['course_id', '=', $curso],
                                ['section', '=', $seccion],
                            ])->Select('user_id')->get();
        
        //recorremos todos los usuarios encontrados y sumamos en 
        //1 el comentario de ese mensaje por su iidentificador key
        foreach($id_users as $id_user)
        {
            //DB::table('msj_'.$id_user->user_id)->increment('comentarios')->where('key' , $key);
            //DB::table('msj_'.$id_user->user_id)->increment('comentarios')->where('key', $key) ;
            DB::table('msj_'.$id_user->user_id)
                    ->where('key', $key) 
                    ->increment('comentarios');
        }

        //obtenemos los id de los usuarios maestros asignados en este curso y seccion
        $id_users2 = Assignment::where([
            ['course_id', '=', $curso],
            ['section', '=', $seccion],
        ])->Select('user_id')->distinct()->get();

        //recorremos todos los usuarios encontrados y les eviamos el mensaje
        foreach($id_users2 as $id_user2)
        {
           //DB::table('msj_'.$id_user2->user_id)->increment('comentarios',1, array('key' => $key));
            DB::table('msj_'.$id_user2->user_id)
            ->where('key', $key) 
            ->increment('comentarios');

            //DB::table('msj_'.$id_user2->user_id)->increment('comentarios')->where('key', $key) ;
        }

        //obtenemos el id del comentario recien guardado
        $id = DB::table($tbl_comentarios)->max('id');
        //obtenemos el comentario recien almacenado
         $comentario = DB::table($tbl_comentarios)
                         ->join('users', $tbl_comentarios.'.user_id', '=', 'users.id')
                         ->where($tbl_comentarios.'.id',$id)
                         ->get();
         //enviamos el mensaje recien almacenado,para que aparezca
         return view('ajax/enviar_comentario',compact('comentario'));

    }

    public function ver_comentarios(Request $request){
        //obtener el identificador unico del post que estan viendo
        $key=$request->key_msj;
        $curso=$request->curso;
        $user=$request->usuario;
        $seccion=strtolower($request->seccion);

        //obtenemos el rol del usuario actual
        $role = DB::table('users')->where('id',$user)->Select('role')->get();

        //usamos una variable para reducir el nombre de la tabla
        $tbl_comentarios = 'comentarios_'.$curso.'_'. $seccion;

        //mostramos los ultimos 20 comentario creados 
        $comentarios = DB::table($tbl_comentarios)
                        ->join('users', $tbl_comentarios.'.user_id', '=', 'users.id')
                        ->where($tbl_comentarios.'.msj_key',$key)
                        ->get();
            
        
        return view('ajax/ver_comentarios',compact('comentarios','role'));
    }

    public function publicarComentario(Request $request){

         //obtener el identificador unico del post que estan viendo
         $key=$request->key_msj;
         $usuario = $request->user_id;
         $comentario=$request->mensaje;
         $curso=$request->curso_id;
         $seccion=strtolower($request->seccion_id);

        //almacenar comentario en la tabla de comentarios de este cursos y seccion

        //usamos una variable para reducir el nombre de la tabla
        $tbl_comentarios = 'comentarios_'.$curso.'_'. $seccion;

        //insertamos el comentario en la tabla que corrsponde a ese curso y seccion
        $msj= DB::table($tbl_comentarios)->insert([

            'user_id'=>$usuario,
            'msj_key'=>$key,
            'fecha'=>Carbon::now(),
            'comentario'=>$comentario
            
        ]);
 
         //obtenemos los id de los usuarios estudiantes matriculados en este curso y seccion
         $id_users = Enrollment::where([
            ['course_id', '=', $curso],
            ['section', '=', $seccion],
        ])->Select('user_id')->get();
        
        //recorremos todos los usuarios encontrados y sumamos en 
        //1 el comentario de ese mensaje por su iidentificador key
        foreach($id_users as $id_user)
        {
            DB::table('msj_'.$id_user->user_id)
            ->where('key', $key) 
            ->increment('comentarios');
        }

        //obtenemos los id de los usuarios docente asignados en este curso y seccion
        $id_users2 = Assignment::where([
            ['course_id', '=', $curso],
            ['section', '=', $seccion],
        ])->Select('user_id')->distinct()->get();

        //recorremos todos los usuarios encontrados y les eviamos el mensaje
        foreach($id_users2 as $id_user2)
        {
           //DB::table('msj_'.$id_user2->user_id)->increment('comentarios',1, array('key' => $key));
            DB::table('msj_'.$id_user2->user_id)
            ->where('key', $key) 
            ->increment('comentarios');

            //DB::table('msj_'.$id_user2->user_id)->increment('comentarios')->where('key', $key) ;
        }

        //obtenemos el id del comentario recien guardado
        $id = DB::table($tbl_comentarios)->max('id');
        //obtenemos el comentario recien almacenado
         $comentario = DB::table($tbl_comentarios)
                         ->join('users', $tbl_comentarios.'.user_id', '=', 'users.id')
                         ->where($tbl_comentarios.'.id',$id)
                         ->get();
         //enviamos el mensaje recien almacenado,para que aparezca
         return view('ajax/publicarComentario',compact('comentario'));
        
    }

    public function panel($user_id){

         /*************************SEGURIDAD*******************/
            //control de seguridad
            // Get the currently authenticated user...
            if ( !($user = Auth::user()) ){
                return "ACCESO SOLO PARA USUARIOS REGISTRADOS."; 
            }
            
            if( $user->role!='admin'){
                return ("ÁREA EXCLUSIVA DEL ADMINISTRADOR.");
            }

        /*************************SEGURIDAD*******************/

         //obtenemos los datos del docente
         $user = User::findOrFail($user_id);

        $asignaciones = DB::table('sectioncourses')
                        ->join('courses', 'sectioncourses.course_id', '=', 'courses.id')
                        ->Select('courses.id as course_id','courses.short_name as course','sectioncourses.section')
                        ->orderBy('course_id','ASC')
                        ->get();


        return view('users/panel',compact('asignaciones','user'));
       
    }

    public function panel_admin($user_id){

        /*************************SEGURIDAD*******************/
           //control de seguridad
           // Get the currently authenticated user...
           if ( !($user = Auth::user()) ){
               return "ACCESO SOLO PARA USUARIOS REGISTRADOS."; 
           }
           
           if( $user->role!='admin'){
               return ("ÁREA EXCLUSIVA DEL ADMINISTRADOR.");
           }

       /*************************SEGURIDAD*******************/

       //obtenemos los datos del docente
       $user = User::findOrFail($user_id);

       $asignaciones = DB::table('sectioncourses')
                       ->join('courses', 'sectioncourses.course_id', '=', 'courses.id')
                       ->Where('courses.modality_id','=',2)
                       ->Select('courses.id as course_id','courses.short_name as course','sectioncourses.section')
                       ->orderBy('course_id','ASC')
                       ->orderBy('section','ASC')
                       ->get();
    

       return view('users/panel_admin',compact('asignaciones','user'));
      
   }

   public function acumulativos($user_id,$curso,$section,$clase,$parcial){

     

   }

    public function boletas($course_id,$section){

          /*************************SEGURIDAD*******************/
            //control de seguridad
            // Get the currently authenticated user...
            if ( !($user = Auth::user()) ){
                return "ACCESO SOLO PARA USUARIOS REGISTRADOS."; 
            }
            
            if( $user->role!='admin'){
                return ("ÁREA EXCLUSIVA DEL ADMINISTRADOR.");
            }

        /*************************SEGURIDAD*******************/

        //obtenemos los id de los estudiantes matriculados en este curso y seccion
          $estudiantes = DB::table('enrollments')
                         ->join('users', 'enrollments.user_id', '=', 'users.id')
                         ->where ([
                                    ['enrollments.course_id', '=', $course_id],
                                    ['enrollments.section', '=', $section],
                                ])
                        ->Select('users.name','users.lastname','users.id as user_id','users.sexo')
                        ->orderBy('users.sexo','asc')
                        ->orderBy('users.name','asc')
                        ->get(); 
                        //dd($estudiantes);

            $curso = $course_id;
            $course =  Course::findOrFail($course_id);
            $seccion = strtolower($section);
        
        //obtenemos las clase que estan asignadas a este curso
     
       $clases = DB::table('clasecourses')
                        ->join('clases', 'clasecourses.clase_id', '=', 'clases.id')
                        //->where('clasecourses.course_id','=',$course_id)
                        ->where ([
                            ['clasecourses.course_id', '=', $course_id],
                            ['clases.semester', '!=', 1],
                            ['clases.oficial', '!=', 2],
                        ])
                        ->Select('clase_id')
                        ->get(); 
        
       $pdf = PDF::loadView('users/boletas', ['curso' => $curso,'seccion' => $seccion,'course' => $course,'section' => $section,'estudiantes' => $estudiantes,'clases' => $clases]  );
       $pdf->setPaper('a4','landscape');
       return $pdf->download('calificaciones.pdf');
             
       //return view('users/boletas',compact('estudiantes','curso','seccion','clases','course','section'));
    }

    public function boletas_docentes(){

        /*************************SEGURIDAD*******************/
          //control de seguridad
          // Get the currently authenticated user...
          if ( !($user = Auth::user()) ){
              return "ACCESO SOLO PARA USUARIOS REGISTRADOS."; 
          }
          
          if( $user->role!='admin'){
              return ("ÁREA EXCLUSIVA DEL ADMINISTRADOR.");
          }

      /*************************SEGURIDAD*******************/

        $docentes = DB::table('users')->where ([
                                ['users.role', '=', 'teacher'],
                                ['users.cuenta', '>', '20193000'],
                                ['users.cuenta', '<', '20194702']//no incluyo a los ultimos 3 docentes
                            ])
                            ->Select('users.name','users.lastname','users.id','users.cuenta')
                            ->get();
      
     $pdf = PDF::loadView('users/boletas_docentes',['docentes' => $docentes] );
     //$pdf->setPaper('a4','portraint');
     return $pdf->download('calificaciones_docentes.pdf');
           
     //return view('users/boletas',compact('estudiantes','curso','seccion','clases','course','section'));
  }

  public function reporte_docentes($parcial){

      /*************************SEGURIDAD*******************/
          //control de seguridad
          // Get the currently authenticated user...
          if ( !($user = Auth::user()) ){
            return "ACCESO SOLO PARA USUARIOS REGISTRADOS."; 
        }
        
        if( $user->role!='admin'){
            return ("ÁREA EXCLUSIVA DEL ADMINISTRADOR.");
        }

        /*************************SEGURIDAD*******************/

      $docentes = DB::table('users')->where ([
                              ['users.role', '=', 'teacher'],
                              ['users.cuenta', '>', '20193000']
                          ])
                          ->Select('users.name','users.lastname','users.id','users.cuenta')
                          ->get();
    
        $pdf = PDF::loadView('users/reporte_docentes',['docentes' => $docentes,'parcial' => $parcial] );
        //$pdf->setPaper('a4','portraint');
        return $pdf->download('reporte_docentes.pdf');
  }

    //funcion para mostar el panel del consejero
    public function panel_consejeria($user_id){

        /*************************SEGURIDAD*******************/
           //control de seguridad
           // Get the currently authenticated user...
           if ( !($user = Auth::user()) ){
               return "ACCESO SOLO PARA USUARIOS REGISTRADOS."; 
           }
           
           if( $user->role != 'consejero'){
               return "ÁREA EXCLUSIVA DE CONSEJERIA.";
           }
       /*************************SEGURIDAD*******************/

        //obtenemos los datos del docente
        $user = User::findOrFail($user_id);

       $asignaciones = DB::table('sectioncourses')
                       ->join('courses', 'sectioncourses.course_id', '=', 'courses.id')
                       ->where('sectioncourses.course_id','>',8)
                       ->Select('courses.id as course_id','courses.short_name as course','sectioncourses.section')
                       ->orderBy('course_id','ASC')
                       ->get();

       return view('users/panel_consejeria',compact('asignaciones','user'));
      
   }

   //funcion para mostrar la seccion de personalidd al consejero
   public function personalidad($user_id,$course_id,$section,$parcial){

    /*************************SEGURIDAD*******************/
        //control de seguridad
        // Get the currently authenticated user...
        if ( !($user = Auth::user()) ){
            return "ACCESO SOLO PARA USUARIOS REGISTRADOS."; 
        }
        
        if( $user->role != 'consejero'){
            return ("ÁREA EXCLUSIVA DE CONSEJERIA.");
        }

    /*************************SEGURIDAD*******************/


    //obtenemos los datos del docente
    $user = User::findOrFail($user_id);

    //obtenemos los id de los estudiantes matriculados en este curso y seccion
    $students = DB::table('enrollments')
                   ->join('users', 'enrollments.user_id', '=', 'users.id')
                   ->where ([
                              ['enrollments.course_id', '=', $course_id],
                              ['enrollments.section', '=', $section],
                          ])
                   ->Select('users.name','users.lastname','users.id as user_id','users.sexo')
                   ->orderBy('users.sexo','asc')
                   ->orderBy('users.name','asc')
                   ->get(); 
                 // dd($user);

      $curso =  Course::findOrFail($course_id);
                    
      $seccion = $section;
      $partial = $parcial;

    return view('users/personalidad',compact('students','user','curso','seccion','partial'));
}

//funcion para guardar las notas de personalidad ingresadas desde el usuario consejero
public function save_personalidad(Request $request){

      /*************************SEGURIDAD*******************/
        //control de seguridad
        // Get the currently authenticated user...
        if ( !($user = Auth::user()) ){
            return "ACCESO SOLO PARA USUARIOS REGISTRADOS."; 
        }
        
        if( $user->role != 'consejero'){
            return ("ÁREA EXCLUSIVA DE CONSEJERIA.");
        }

    /*************************SEGURIDAD*******************/

    //obtenemos los id de los estudiantes matriculados en este curso y seccion
    $students = DB::table('enrollments')
                   ->where ([
                              ['enrollments.course_id', '=', $request->curso],
                              ['enrollments.section', '=',$request->seccion],
                          ])
                   ->Select('enrollments.user_id')
                   ->get(); 

    $partial = $request->parcial;

    foreach ($students as $student) {

        $select1= 'clase1_'.$student->user_id;
        $select2= 'clase2_'.$student->user_id;
        $select3= 'clase3_'.$student->user_id;
        $select4= 'clase4_'.$student->user_id;
        $select5= 'clase5_'.$student->user_id;
        $select6= 'clase6_'.$student->user_id;
        $reportes= 'reporte_'.$student->user_id;
        $inasistencias= 'inasistencias_'.$student->user_id;
        
        $resp =DB::table('personalidad')
                ->where([
                    ['personalidad.student_id', '=', $student->user_id],
                    ['personalidad.parcial', '=', $partial ],
                ])
                ->update(array(
                    'clase1' =>$request->$select1,
                    'clase2' =>$request->$select2,
                    'clase3' =>$request->$select3,
                    'clase4' =>$request->$select4,
                    'clase5' =>$request->$select5,
                    'clase6' =>$request->$select6,
                    'reportes' =>$request->$reportes,
                    'inasistencias' =>$request->$inasistencias,
                    ) );
    }
    
    $user = Auth::user();
     //obtenemos los datos del docente
     $user = User::findOrFail($user->id);

    $asignaciones = DB::table('sectioncourses')
                    ->join('courses', 'sectioncourses.course_id', '=', 'courses.id')
                    ->where('sectioncourses.course_id','>',8)
                    ->Select('courses.id as course_id','courses.short_name as course','sectioncourses.section')
                    ->orderBy('course_id','ASC')
                    ->get();

    return view('users/panel_consejeria',compact('asignaciones','user'));
}

public function actas($course_id,$section,$parcial){

    /*************************SEGURIDAD*******************/
      //control de seguridad
      // Get the currently authenticated user...
      if ( !($user = Auth::user()) ){
          return "ACCESO SOLO PARA USUARIOS REGISTRADOS."; 
      }
      
      if( $user->role!='admin'){
          return ("ÁREA EXCLUSIVA DEL ADMINISTRADOR.");
      }

  /*************************SEGURIDAD*******************/

  //obtenemos los id de los estudiantes matriculados en este curso y seccion
    $estudiantes = DB::table('enrollments')
                   ->join('users', 'enrollments.user_id', '=', 'users.id')
                   ->where ([
                              ['enrollments.course_id', '=', $course_id],
                              ['enrollments.section', '=', $section],
                          ])
                  ->Select('users.name','users.lastname','users.id as user_id','users.sexo')
                  ->orderBy('users.sexo','asc')
                  ->orderBy('users.name','asc')
                  ->get(); 
                  //dd($estudiantes);

      $curso = $course_id;
      $course =  Course::findOrFail($course_id);
      $seccion = strtolower($section);
  
  //obtenemos las clase que estan asignadas a este curso

 /*$clases = DB::table('clasecourses')
                  ->join('clases', 'clasecourses.clase_id', '=', 'clases.id')
                  ->where('clasecourses.course_id','=',$course_id)
                  ->Select('clasecourses.clase_id','clases.short_name')
                  ->get(); */

    $clases = DB::table('clasecourses')
                  ->join('clases', 'clasecourses.clase_id', '=', 'clases.id')
                  ->where ([
                    ['clasecourses.course_id', '=', $course_id],
                    ['clases.semester', '!=', 1],
                  ])
                  ->Select('clasecourses.clase_id','clases.short_name')
                  ->get(); 
  
 /*$pdf = PDF::loadView('users/actas', ['curso' => $curso,'seccion' => $seccion,'course' => $course,'section' => $section,'estudiantes' => $estudiantes,'clases' => $clases,'parcial' => $parcial]  );
 $pdf->setPaper('legal','landscape');
 return $pdf->download('Actas de I Parcial.pdf');*/
       
 return view('users/actas',compact('estudiantes','curso','seccion','clases','course','section','parcial'));
}

//metodo para gestionar las encuestas del personal docente realizada por los estudiantes
public function encuesta(){

      /*************************SEGURIDAD*******************/
        //control de seguridad
        // Get the currently authenticated user...
        if ( !($user = Auth::user()) ){
            return "ACCESO SOLO PARA USUARIOS REGISTRADOS."; 
        }
        
        if( $user->role != 'admin'){
            return ("ÁREA EXCLUSIVA DEL ADMINISTRADOR.");
        }

    /*************************SEGURIDAD*******************/

    return view('users/encuesta');

}

public function verificar_cuenta(Request $request){

    if ( !($user = Auth::user()) ){
        return "ACCESO SOLO PARA USUARIOS REGISTRADOS."; 
    }

    if( $user->role != 'admin'){
        return ("ÁREA EXCLUSIVA DEL ADMINISTRADOR.");
    }
    
    //determinamos el numero de cuenta para comprobar que este registrado
    $usuario = User::where('cuenta',$request->cuenta)->get();
    //confirmamos que SI este registraso
    if(isset($usuario[0]->cuenta )){

        //determinamos el grado y seccion de este usuario
       $matricula = Enrollment::where('user_id',$usuario[0]->id)->get();

       //determinados los docente que le brindan clases a este estudiante
       $docentes = DB::table('assignments')
                    ->join('users', 'assignments.user_id', '=', 'users.id')
                    ->where([
                        ['assignments.course_id', '=', $matricula[0]->course_id],
                        ['assignments.section', '=', $matricula[0]->section]
                    ])
                    ->Select('users.id as docente','name','lastname')->distinct()->get();

      //obtenemos la cantidad de docentes que le dan clases a este estudiante
      $cont_docentes = DB::table('assignments')
                ->join('users', 'assignments.user_id', '=', 'users.id')
                ->where([
                    ['assignments.course_id', '=', $matricula[0]->course_id],
                    ['assignments.section', '=', $matricula[0]->section]
                ])
                ->Select(DB::raw('count(*) as cantidad'))->get();

                dd($docentes[0]->cantidad);



       // obtenemos el dato de la tabla control de encuesta para ver enque pregunta va este estudiante
       $control = DB::table('control_encuesta')
                        ->where('estudiante','=',$usuario[0]->id)
                        ->get();
       
       switch ($control[0]->pregunta) {
            case '0':
                   //obtenemos la pregunta numero 1 de la base de datos
                   $preguntas = DB::table('preguntas')->where('id','=',1)->get();
               break;
            case '1':
                     //obtenemos la pregunta numero 1 de la base de datos
                     $preguntas = DB::table('preguntas')->where('id','=',2)->get();
               break;
            case '2':
                      //obtenemos la pregunta numero 1 de la base de datos
                     $preguntas = DB::table('preguntas')->where('id','=',3)->get();
               break;
            case '3':
                      //obtenemos la pregunta numero 1 de la base de datos
                     $preguntas = DB::table('preguntas')->where('id','=',4)->get();
               break;
            case '4':
                      //obtenemos la pregunta numero 1 de la base de datos
                     $preguntas = DB::table('preguntas')->where('id','=',5)->get();
               break;
            case '5':
                      //obtenemos la pregunta numero 1 de la base de datos
                     $preguntas = DB::table('preguntas')->where('id','=',6)->get();
               break;
            case '6':
                      //obtenemos la pregunta numero 1 de la base de datos
                     $preguntas = DB::table('preguntas')->where('id','=',7)->get();
               break;
            case '7':
                      //obtenemos la pregunta numero 1 de la base de datos
                     $preguntas = DB::table('preguntas')->where('id','=',8)->get();
               break;
            case '8':
                      //obtenemos la pregunta numero 1 de la base de datos
                     $preguntas = DB::table('preguntas')->where('id','=',9)->get();
               break;
            case '9':
                      //obtenemos la pregunta numero 1 de la base de datos
                     $preguntas = DB::table('preguntas')->where('id','=',10)->get();
               break; 
           
           default:
                    return view('users/final_encuesta');
               break;
       }
        
        //return redirect()->route('realizar_encuesta',compact('usuario'));
        return view('users/realizar_encuesta',compact('docentes','preguntas','usuario','cont_docentes'));
    }
    //en caso de no estar regstrado
    else{
        return "REGISTRO NO ENCONTRADO EN LA BASE DE DATOS";
    } 

}

public function votar_encuesta(Request $request){
        
    $pregunta=$request->_pregunta;//obtenemos el numero de la pregunta en la que estamos
    $docente=$request->_docente;//docente que se esta evaluanddo
    $estudiante=$request->_estudiante;//estudiante que esta evaluando
    $valor=$request->_valor;//valor de la calificacion dada por el estudiante 1-4
    $contador=$request->_contador;//valor de la calificacion dada por el estudiante 1-4

    //nos ubicamos en el numero de la pregunta que estamos evaluando
    if ($pregunta == 1){$preg='p1';}
    if ($pregunta == 2){$preg='p2';}
    if ($pregunta == 3){$preg='p3';}
    if ($pregunta == 4){$preg='p4';}
    if ($pregunta == 5){$preg='p5';}
    if ($pregunta == 6){$preg='p6';}
    if ($pregunta == 7){$preg='p7';}
    if ($pregunta == 8){$preg='p8';}
    if ($pregunta == 9){$preg='p9';}
    if ($pregunta == 10){$preg='p10';}
   
    //ingresamos el valor dado por el alumno a la tabla encuestas
    $resp =DB::table('encuestas')
                ->where([
                    ['encuestas.estudiante', '=', $estudiante],
                    ['encuestas.docente', '=',$docente]
                ])
                ->update(array(
                   $preg=>$valor,
                   'fecha'=>date("Y-m-d H:i:s")
                   ) );

    //al llegar al ultimo docente se actualiza la tabla control encuesta
    if ($contador ==1){
        $resp =DB::table('control_encuesta')
                ->where([
                    ['estudiante', '=', $estudiante],
                ])
                ->update(array(
                   'pregunta'=>$pregunta,
                   'fecha'=>date("Y-m-d H:i:s")
                    ) );
    }
    
}


}

