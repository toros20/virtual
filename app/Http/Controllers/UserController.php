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

use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = DB::table('users')->get();
        $users = User::all();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_estudiante()
    {
        $modalities = Modality::all();
        $courses = Course::all();
        return view('users.create_estudiante',compact('modalities','courses'));
    }

    public function create_teacher()
    {
        return view('users.create_teacher');
    }

    public function students()
    {
        //selecciomos todos los usuarios del tipo student
        //$students = DB::table('users')->where('role','student')->get();
        $students = User::where('role','student')->get();
        return view('users.students',compact('students'));

    }

    public function teachers()
    {
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
        
        //Codigo para insertar student
        if ($request->input('role')=='student') {
            
            //insertamos el nuevo usuario student, de ingresarse correctamente 
            //ingresamos los datos de enrollments
            if( $user=User::create($request->all()) ){

                //id del usuario recien creado
                $new_id= $user->id;

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

                return redirect()->route('users.students');

            }
        }

        //Codigo para insertar employees
        if ($request->input('role')=='teacher') {
            
            $user=User::create($request->all()) ;
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
    
     // realizar una publicacion del tipo section (solo para los miembros de una seccion)
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
                'clase'=>$request->clase,
                'key'=>$key
                
            ]);
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
                'tipo'=>"seccion",
                'key'=>$key
                
            ]);
        }

        //obtenemos el id del mensaje recien guardado
        $id = DB::table('msj_'.$request->user_id)->max('id');
       //obtenemos el mensaje recien almacenado
        $mensaje = DB::table('msj_'.$request->user_id)
                        ->join('users', 'msj_'.$request->user_id.'.remitente', '=', 'users.id')
                        ->where('msj_'.$request->user_id.'.id',$id)->get();
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

}

