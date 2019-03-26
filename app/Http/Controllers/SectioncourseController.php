<?php

namespace App\Http\Controllers;

use App\Modality;
use App\Course;
use App\Sectioncourse;
use Illuminate\Http\Request;

use Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SectioncourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sectioncourses = Sectioncourse::all();
        return view('sectioncourses.index',compact('sectioncourses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modalities = Modality::all();
        $courses = Course::all();

        return view('sectioncourses.create',compact('modalities','courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //creamos la nueva asignacion de seccion a curso
        Sectioncourse::create($request->all());

        //obtenemos el curso y seccion
        $seccion=strtolower($request->section);
        $curso = $request->course_id;

        //nombramos las tablas que vamos a crear
        $tbl_task='task_'.$curso.'_'.$seccion;
        $tbl_taskstudent='taskstudent_'.$curso.'_'.$seccion;

        //creamos la tabla task principal de este curso y seccion (ejemplo task_1_a)
        Schema::connection('mysql')->create($tbl_task, function($table)
        {
            $table->increments('id');
            $table->integer('teacher');
            $table->integer('clase');
            $table->integer('parcial');
            $table->string('titulo');
            $table->text('descripcion');
            $table->boolean('evaluada');
            $table->date('fecha_entrega');
            $table->date('fecha_publicada');
            $table->integer('valor');
            $table->string('tipo');

            $table->timestamps();
        });


        //creamos la tabla taskstudents de este curso y seccion (ejemplo taskstudent_1_a)
        Schema::connection('mysql')->create( $tbl_taskstudent, function($table) use ($curso,$seccion)
        {
            $table->increments('id');
            $table->integer('student');
            $table->integer( 'task_'.$curso.'_'.$seccion.'_id');
            $table->integer('valor_obtenido');
            $table->string('observacion')->nullable($value = true);

            $table->timestamps();
        });

        return redirect()->route('sectioncourses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sectioncourse  $sectioncourse
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $sectioncourse = Sectioncourse::findOrFail($id);
       return view('sectioncourses.show',compact('sectioncourse'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sectioncourse  $sectioncourse
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modalities = Modality::all();
        $courses = Course::all();
        $sectioncourse = Sectioncourse::findOrFail($id);
        return view('sectioncourses.edit',compact('sectioncourse','modalities','courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sectioncourse  $sectioncourse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sectioncourse = Sectioncourse::findOrFail($id)->update($request->all());
        return redirect()->route('sectioncourses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sectioncourse  $sectioncourse
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sectioncourse = Sectioncourse::findOrFail($id)->delete();
        return redirect()->route('sectioncourses.index');
    }
}
