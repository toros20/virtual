<?php

namespace App\Http\Controllers;

use App\Modality;
use App\Course;
use App\Sectioncourse;
use Illuminate\Http\Request;

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
        Sectioncourse::create($request->all());
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
