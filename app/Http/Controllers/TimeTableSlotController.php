<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeTableSlot;
class TimeTableSlotController extends Controller
{
    public function get_timetable_slot(){
        $timetable_slots = TimeTableSlot::get();
        return response()->json(['timetable_slot'=>$timetable_slots]);
    }

    public function create_timetable_slot(Request $request){
        $this->validate($request, [
            "timetable_id"              => 'required',
            "course_program_id"         => 'required',
            "slot_id"                   => 'required',
            // "lecturer_id"               => 'required',
            // "room_id"                   => 'required',
            "group_merge_id"            => 'required',
            "course_name"               => 'required',
            "type"                      => 'required',
            "durations"                 => 'required',
            "start"                     => 'required',
            "end"                       => 'required',
            "created_uid"               => 'required',
            "updated_uid"               => 'required',
        ]);

        $timetable_slots = new TimeTableSlot;
        $timetable_slots->timetable_id              = $request->timetable_id;
        $timetable_slots->course_program_id         = $request->course_program_id;
        $timetable_slots->slot_id                   = $request->slot_id;
        $timetable_slots->lecturer_id               = $request->lecturer_id;
        $timetable_slots->room_id                   = $request->room_id;
        $timetable_slots->group_merge_id            = $request->group_merge_id;
        $timetable_slots->course_name               = $request->course_name;
        $timetable_slots->type                      = $request->type;
        $timetable_slots->durations                 = $request->durations;
        $timetable_slots->start                     = $request->start;
        $timetable_slots->end                       = $request->end;
        $timetable_slots->created_uid               = $request->created_uid;
        $timetable_slots->updated_uid               = $request->updated_uid;

        $timetable_slots->save();
        return response()->json(['message'=>'success','data'=>$timetable_slots]);
    }

    public function delete_timetable_slot($id){
        $timetable_slots = TimeTableSlot::destroy($id);
        if ($timetable_slots) {
            return response()->json(['message' => 'successfully']);
        } else {
            return response()->json(['message' => 'timetable_slot not found'], 404);
        }
    }

    public function update_timetable_slot(Request $request, $id){
        try {
            $this->validate($request, [
                "timetable_id"              => 'required',
                "course_program_id"         => 'required',
                "slot_id"                   => 'required',
                // "lecturer_id"               => 'required',
                // "room_id"                   => 'required',
                "group_merge_id"            => 'required',
                "course_name"               => 'required',
                "type"                      => 'required',
                "durations"                 => 'required',
                "start"                     => 'required',
                "end"                       => 'required',
                "created_uid"               => 'required',
                "updated_uid"               => 'required',
            ]);

            $timetable_slot = TimetableSlot::findOrFail($id);

            $timetable_slot->timetable_id              = $request->timetable_id;
            $timetable_slot->course_program_id         = $request->course_program_id;
            $timetable_slot->slot_id                   = $request->slot_id;
            $timetable_slot->lecturer_id               = $request->lecturer_id;
            $timetable_slot->room_id                   = $request->room_id;
            $timetable_slot->group_merge_id            = $request->group_merge_id;
            $timetable_slot->course_name               = $request->course_name;
            $timetable_slot->type                      = $request->type;
            $timetable_slot->durations                 = $request->durations;
            $timetable_slot->start                     = $request->start;
            $timetable_slot->end                       = $request->end;
            $timetable_slot->created_uid               = $request->created_uid;
            $timetable_slot->updated_uid               = $request->updated_uid;

            $timetable_slot->save();

            return response()->json(['message' => 'Timetable slot updated successfully', 'data' => $timetable_slot]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
