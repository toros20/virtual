<?php

namespace App\Http\Controllers;

use App\User;
use App\Enrollment;
use App\Course;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function students_panel($id){
       
        $user = User::findOrFail($id);
        
        $enroll = Enrollment::where('user_id',$id)->get();

        //dd($enroll[0]->course_id);

        $course = Course::where('id',$enroll[0]->course_id)->get();
        //dd($course);
        return view('students/panel',compact('user','course','enroll'));
        
     }
}