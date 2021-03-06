<?php

namespace App\Http\Controllers;

use DB;

use App\Enrollment;
use App\Course;
use App\User;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Enrollment  $enrollment
     * @return \Illuminate\Http\Response
     */
    public function show(Enrollment $enrollment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Enrollment  $enrollment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$enrollment = Enrollment::findOrFail($id);
        $courses = Course::all();

        $enrollments =   DB::table('users')
                ->join('enrollments', 'users.id', '=', 'enrollments.user_id')
                ->where ([
                    ['enrollments.id', '=', $id] 
                ])
                ->Select('users.name as name','users.lastname','users.cuenta','enrollments.id as enrollment_id','enrollments.year','enrollments.user_id')
                ->get();

    
        $matricula = Enrollment::where([
            ['id', '=', $id],
        ])->Select('course_id','section')->get();

        $curso = Course::findOrFail($matricula[0]->course_id);
        $section = $matricula[0]->section;
                
        return view('enrollments.edit',compact('enrollments','courses','curso','section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Enrollment  $enrollment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $enrollment = Enrollment::findOrFail($id)->update($request->all());
        //return Redirect::back()->withErrors(['msg', 'Transferencia Completa']);
        return redirect()->route('users_panel/{user_id}',63);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Enrollment  $enrollment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enrollment $enrollment)
    {
        //
    }
}
