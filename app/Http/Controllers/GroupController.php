<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    public function getGroups()
{
    $groups = DB::table('studentAnnuals as sa')
        ->join('students as s', 's.id', '=', 'sa.student_id')
        ->leftJoin('group_student_annuals as ga', 'ga.student_annual_id', '=', 'sa.id')
        ->join('groups', 'groups.id', '=', 'ga.group_id')
        ->select('groups.*') // Select all columns from the "groups" table
        ->where('sa.academic_year_id', 2023)
        ->where('sa.grade_id', 4)
        ->where('sa.department_id', 4)
        ->where('ga.semester_id', 2)
        ->whereNull('ga.department_id')
        ->groupBy('groups.id', /* Add all other columns from the "groups" table here */)
        ->orderBy('groups.code')
        ->get();

    return response()->json(['groups' => $groups]);
}

}
