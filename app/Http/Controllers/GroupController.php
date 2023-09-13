<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    public function getGroups(Request $request)
    {
        $groups = DB::table('studentAnnuals as sa')
            ->join('students as s', 's.id', '=', 'sa.student_id')
            ->leftJoin('group_student_annuals as ga', 'ga.student_annual_id', '=', 'sa.id')
            ->join('groups', 'groups.id', '=', 'ga.group_id')
            ->select('groups.*');
            if(isset($request->academic_year_id)){
                $groups->where('sa.academic_year_id',$request->academic_year_id);
            } 
            if(isset($request->department_id)){
                $groups->where('sa.department_id',$request->department_id);
            }
            if(isset($request->grade_id)){
                $groups->where('sa.grade_id',$request->grade_id);
            }
            if(isset($request->semester_id)){
                $groups->where('sa.semester_id',$request->semester_id);
            }
            
            // Select all columns from the "groups" table
            // ->where('sa.academic_year_id', $request->academic_year_id)
            // ->where('sa.grade_id', 4)
            // ->where('sa.department_id', 4)
            // ->where('ga.semester_id', 2)
            // ->whereNull('ga.department_id')
            // ->groupBy('groups.id', /* Add all other columns from the "groups" table here */)
            $groups->whereNull('ga.department_id')
            ->orderBy('groups.code');
            $query = $groups->get();

        return response()->json( $query);
    }

}
