<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseAnnual;

class CourseAnnualController extends Controller
{
    public function listAll(){
        $course_annules = CourseAnnual::all();
        return response()->json($course_annules);
    }

    public function get_course(){
        return CourseAnnual::with(['course'])->get();
    }
}
