<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Modality;
use App\Course;
use App\Clase;
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

     public function students_panel(){
        
        /*$id=$request->modality_id;
        $clases = Clase::where('modality_id',$id)->get();*/
        return view('students/panel');
        
     }

     public function teachers_panel(){
        
        /*$id=$request->modality_id;
        $clases = Clase::where('modality_id',$id)->get();*/
        return view('teachers/panel');
        
     }

}

