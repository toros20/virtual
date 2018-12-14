<?php

namespace App\Http\Controllers;

use DB;
use App\User;
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
        //return "VAMOS BIEN";
        return view('users.create_estudiante');
    }

    public function students()
    {
        //selecciomos todos los usuarios del tipo student
        //$students = DB::table('users')->where('role','student')->get();
        $students = User::where('role','student')->get();
        return view('users.students',compact('students'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //comando para hacer depuracion
        //dd($request->all());

        /*DB::table('users')->insert([
            "name"=> $request->input('name'),
            "lastname"=> $request->input('lastname'),
            "cuenta"=> $request->input('cuenta'),
            "role"=> $request->input('role'),
            "fecha_nacimiento"=> $request->input('fecha_nacimiento'),
            "email"=> $request->input('email'),
            "password"=> bcrypt($request->input('password')),
            "activo"=> $request->input('activo'),
            "created_at"=> Carbon::now(),
            "updated_at"=> Carbon::now()
        ]);*/

        /*$user = new User; // se crea un objeto vacio de tipo user
        $user->name = $request->input('name'); //se asignan los valores 
        $user->save();//en envian a guardar a la base de datos */
        
        User::create($request->all());

        return redirect()->route('users.index');
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

        /*DB::table('users')->where('id',$id)->update([
            "name"=> $request->input('name'),
            "lastname"=> $request->input('lastname'),
            "cuenta"=> $request->input('cuenta'),
            "fecha_nacimiento"=> $request->input('fecha_nacimiento'),
            "email"=> $request->input('email'),
            "activo"=> $request->input('activo'),
            "updated_at"=> Carbon::now()
        ]);*/

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
}
