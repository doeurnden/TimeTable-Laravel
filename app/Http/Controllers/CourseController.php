<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function get_course_id($id)
    {
        $course = Course::select(
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
            ->orderBy('id', 'asc')
            ->orderBy('degree_id', 'asc')
            ->orderBy('grade_id', 'asc')
            ->orderBy('department_id', 'asc')
            ->orderBy('semester_id', 'asc')
            ->where('id',$id)
            ->get();

        if($course->isEmpty()){
            return response()->json(['message'=> 'Course not found'], 404);
        }

        return response()->json(['message'=>'Course found', 'data'=> $course]);
    }

    public function get_course()
    {
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
            ->orderBy('id', 'asc')
            ->orderBy('degree_id', 'asc')
            ->orderBy('grade_id', 'asc')
            ->orderBy('department_id', 'asc')
            // ->where('department_id',4)
            ->orderBy('semester_id', 'asc')
            ->paginate();
    }
    public function get_course_program()
    {
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
            // ->with('department:id')
            // ->with('grade:id')
            ->orderBy('id', 'asc')
            ->orderBy('degree_id', 'asc')
            ->orderBy('grade_id', 'asc')
            ->orderBy('department_id', 'asc')
            ->orderBy('semester_id', 'asc')
            ->where('semester_id', 1)
            ->where('department_id', 4)
            ->where('grade_id', 3)
            ->get();
    }
}
