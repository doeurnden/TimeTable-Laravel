<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseAnnual;
use Illuminate\Support\Facades\DB;

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

    public function get_courses(Request $request) {
        $course_annuals = DB::table('course_annuals as ca')
        ->leftJoin('departments as d','d.id','=','ca.department_id')
        ->leftJoin('degrees as dg','dg.id','=','ca.degree_id')
        ->leftJoin('grades as g','g.id', '=','ca.grade_id')
        ->select('ca.id','ca.name','ca.semester_id','ca.time_tp','ca.time_td','ca.time_course','ca.name_en',
        'd.id','d.code as d_code','dg.id','dg.code as dg_code','g.id','g.code as g_code');

        if(isset($request->academic_year_id)){
            $course_annuals->where('ca.academic_year_id',$request->academic_year_id);
        }
        if(isset($request->department_id)){
            $course_annuals->where('ca.department_id',$request->department_id);
        }
        if(isset($request->degree_id)){
            $course_annuals->where('ca.degree_id',$request->degree_id);
        }
        if(isset($request->department_option_id)){
            $course_annuals->where('ca.department_option_id',$request->department_option_id);
        }
        if(isset($request->grade_id)){
            $course_annuals->where('ca.grade_id',$request->grade_id);
        }
        if(isset($request->semester_id)){
            $course_annuals->where('ca.semester_id',$request->semester_id);
        }
        $query = $course_annuals->get();
        return response()->json($query);
    }
}
