<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function get_course(){
        return Course::select(
                        'id',
                        'name_en',
                        'time_tp',
                        'time_td',
                        'time_course',
                        'degree_id',
                        'grade_id',
                        'department_id',
                        'semester_id'
                        )
                        ->orderBy('id','asc')
                        ->orderBy('degree_id','asc')
                        ->orderBy('grade_id','asc')
                        ->orderBy('department_id','asc')
                        ->orderBy('semester_id','asc')
                        ->get();
    }
}
