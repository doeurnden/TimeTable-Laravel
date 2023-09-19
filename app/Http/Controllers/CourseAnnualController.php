<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseAnnual;

class CourseAnnualController extends Controller
{
    public function listAll()
    {
        $course_annules = CourseAnnual::all();
        return response()->json($course_annules);
    }

    public function get_course_annual()
    {
        return CourseAnnual::select(
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
}
