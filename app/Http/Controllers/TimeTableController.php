<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeTable;

class TimeTableController extends Controller
{
    public function get_timetable()
    {
        return TimeTable::select(
            'id',
            'academic_year_id',
            'department_id',
            'degree_id',
            'grade_id',
            'option_id',
            'semester_id',
            'week_id',
            'group_id',
        )->get();
    }
}
