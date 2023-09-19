<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Group;
use App\Models\Lecturer;
use Exception;
use Illuminate\Http\Request;
use App\Models\Slot;
use Illuminate\Support\Facades\Validator;

class SlotController extends Controller
{
    public function get_slot_id($id)
    {
        $slot = Slot::find($id);

        if($slot){
            return response()->json(['message' => 'success','slot'=>$slot]);
        }
        else{
            return response()->json(['message' => 'slot '. $id. ' not found']);
        }
    }
    // @create
    public function create(Request $request)
    {
        $this->validate($request, [
            'time_tp'               => 'required',
            'time_td'               => 'required',
            'time_course'           => 'required',
            'academic_year_id'      => 'required',
            'course_program_id'     => 'required',
            'semester_id'           => 'required',
            // 'lecturer_id'           => 'required',
            'group_id'              => 'required',
            // 'time_used'             => 'required',
            // 'time_remaining'        => 'required',
            // 'created_uid'           => 'required',
            // 'write_uid'             => 'required'
        ]);

        $slot = new Slot;
        $slot->time_tp                      = $request->time_tp;
        $slot->time_td                      = $request->time_td;
        $slot->time_course                  = $request->time_course;
        $slot->academic_year_id             = $request->academic_year_id;
        $slot->course_program_id            = $request->course_program_id;
        $slot->semester_id                  = $request->semester_id;
        $slot->lecturer_id                  = $request->lecturer_id;
        $slot->group_id                     = $request->group_id;
        $slot->time_used                    = $request->time_used;
        $slot->time_remaining               = $request->time_remaining;
        $slot->created_uid                  = $request->created_uid;
        $slot->write_uid                    = $request->write_uid;
        $slot->save();

        return response()->json(['message' => 'Slot created successfully', 'slot' => $slot]);
    }
    // @update
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'lecturer_id' => 'required',
            'group_id' => 'required',
        ]);

        $slot = Slot::find($id);
        if (!$slot) {
            return response()->json(['message' => 'Slot not found!'], 404);
        }
        
        $slot->lecturer_id = $request->lecturer_id;
        $slot->group_id = $request->group_id;
        $slot->save();

        return response()->json(['message' => 'Slot updated successfully', 'slot' => $slot]);
    }
    // @delete
    public function delete($id)
    {
        $slot = Slot::destroy($id);
        if ($slot) {
            return response()->json(['message' => 'Slot deleted successfully']);
        } else {
            return response()->json(['message' => 'Slot not found'], 404);
        }
    }
}