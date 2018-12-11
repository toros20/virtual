<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the estudiante.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('estudiantes.index');
    }

    /**
     * Show the form for creating a new estudiante.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('estudiantes.create');
    }

    /**
     * Store a newly created estudiante in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('estudiantes')->insert([
            "nombres"=> $request->input('nombre'),
            "apellidos"=> $request->input('apellido'),
            "cuenta"=> $request->input('cuenta'),
            "fecha_nacimiento"=> $request->input('fecha_nacimiento'),
            "activo"=> $request->input('activo'),
            "created_at"=> Carbon::now(),
            "updated_at"=> Carbon::now()
        ]);

        return redirect()->route('estudiantes.index');
    }

    /**
     * Display the specified estudiante.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified estudiante.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified estudiante in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified estudiante from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
