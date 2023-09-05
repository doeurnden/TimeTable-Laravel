<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeTable;

class TimeTableController extends Controller
{
    public function list()
    {
        $timetable = TimeTable::all();
        return response()->json($timetable);
    }
    public function listByID($id)
    {
        $timetable = TimeTable::find($id);
        if (!$timetable) {
            return response()->json(['error' => 'Timetable not found'], 404);
        }
        return response()->json($timetable);
    }
}
