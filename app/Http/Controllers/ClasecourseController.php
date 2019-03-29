<?php

namespace App\Http\Controllers;

use App\Modality;
use App\Course;
use App\Clase;
use App\Clasecourse;
use Illuminate\Http\Request;

class ClasecourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clasecourses = Clasecourse::orderBy('id','DES')->all();
        return view('clasecourses.index',compact('clasecourses'));
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
        $clases = Clase::all();

        return view('clasecourses.create',compact('modalities','courses','clases'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Clasecourse::create($request->all());
        return redirect()->route('clasecourses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clasecourse  $clasecourse
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $clasecourse = Clasecourse::findOrFail($id);
       return view('clasecourses.show',compact('clasecourse'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clasecourse  $clasecourse
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modalities = Modality::all();
        $courses = Course::all();
        $clases = Clase::all();

        $clasecourse = Clasecourse::findOrFail($id);
        return view('clasecourses.edit',compact('clasecourse','clases','modalities','courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clasecourse  $clasecourse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $clasecourse = Clasecourse::findOrFail($id)->update($request->all());
        return redirect()->route('clasecourses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clasecourse  $clasecourse
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clasecourse = Clasecourse::findOrFail($id)->delete();
        return redirect()->route('clasecourses.index');
    }
}
