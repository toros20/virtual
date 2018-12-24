<?php

namespace App\Http\Controllers;

use App\Modality;
use App\Course;
use App\Clase;
use App\User;
use App\Assignment;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assignments = Assignment::all();
        return view('assignments.index',compact('assignments'));
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
        $users = User::where('role','teacher')->get();

        return view('assignments.create',compact('modalities','courses','clases','users'));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Assignment::create($request->all());
        return redirect()->route('assignments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $assignment = Assignment::findOrFail($id);
       return view('assignments.show',compact('assignment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modalities = Modality::all();
        $courses = Course::all();
        $clases = Clase::all();
        $users = User::where('role','teacher')->get();

        $assignment = Assignment::findOrFail($id);
        return view('assignments.edit',compact('assignment'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $assignment = Assignment::findOrFail($id)->update($request->all());
        return redirect()->route('assignments.index');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assignment $assignment)
    {
        $assignment = Assignment::findOrFail($id)->delete();
        return redirect()->route('assignments.index');
    
    }
}
