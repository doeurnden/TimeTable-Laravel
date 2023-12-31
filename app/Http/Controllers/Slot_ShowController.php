<?php

namespace App\Http\Controllers;

use App\Models\Slot_Show;
use Illuminate\Http\Request;

class Slot_ShowController extends Controller
{
    public function index(Request $request, $timetableId)
    {
        $slots = Slot_Show::select('slots.*')
                    ->join('timetable_slots', 'timetable_slots.slot_id', '=', 'slots.id')
                    ->join('timetables', 'timetables.id', '=', 'timetable_slots.timetable_id')
                    ->where('timetables.id', $timetableId)
                    ->get();

        return  response()->json($slots);
    }
}
