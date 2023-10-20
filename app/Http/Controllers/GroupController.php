<?php

namespace App\Http\Controllers;

use App\Models\StudentAnnuals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    public function getGroups(Request $request)
    {
        // $groups =DB::table("studentAnnuals as sa")->
        //     join('students as s', 's.id', '=', 'sa.student_id')
        //     ->leftJoin('group_student_annuals as ga', 'ga.student_annual_id', '=', 'sa.id')
        //     ->join('groups', 'groups.id', '=', 'ga.group_id')
        //     ->select('  .*');
        //     if(isset($request->academic_year_id)){
        //         $groups->where('sa.academic_year_id',$request->academic_year_id);
        //     }
        //     if(isset($request->department_id)){
        //         $groups->where('sa.department_id',$request->department_id);
        //     }
        //     if(isset($request->grade_id)){
        //         $groups->where('sa.grade_id',$request->grade_id);
        //     }
        //     if(isset($request->semester_id)){
        //         $groups->where('ga.semester_id',$request->semester_id);
        //     }
        //     $groups->whereNull('ga.department_id')
        //     ->groupBy('groups.id')
        //     ->orderBy('groups.code');
        //     $query = $groups->get();

        // return response()->json($query);
        $groups = StudentAnnuals::cacheFor(60 * 60)->from('studentAnnuals as sa')->
            join('students as s', 's.id', '=', 'sa.student_id')
            ->leftJoin('group_student_annuals as ga', 'ga.student_annual_id', '=', 'sa.id')
            ->join('groups', 'groups.id', '=', 'ga.group_id')->select('groups.*');
        if (isset($request->academic_year_id)) {
            $groups= $groups->where('sa.academic_year_id', $request->academic_year_id);
        }
        if (isset($request->department_id)) {
            $groups= $groups->where('sa.department_id', $request->department_id);
        }
        if (isset($request->grade_id)) {
            $groups=$groups->where('sa.grade_id', $request->grade_id);
        }
        if (isset($request->semester_id)) {
            $groups=$groups->where('ga.semester_id', $request->semester_id);
        }
        $groups=$groups->whereNull('ga.department_id')
            ->groupBy('groups.id')
            ->orderBy('groups.code');
        return response()->json($groups->get());
    }
}
