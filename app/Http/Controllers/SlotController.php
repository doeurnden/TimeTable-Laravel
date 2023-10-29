<?php

namespace App\Http\Controllers;

use App\Http\Requests\SlotRequest;
use App\Http\Requests\SlotRequestUpdate;
use App\Models\Course;
use App\Models\Group;
use App\Models\Lecturer;
use App\Models\MergeTimeTableSlot;
use Exception;
use Illuminate\Http\Request;
use App\Models\Slot;
use App\Models\TimeTable;
use App\Models\TimeTableSlot;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SlotController extends Controller
{
    public function updateSlot($id,SlotRequestUpdate $request){
        try {
            DB::beginTransaction();
            $timetableSlot=TimeTableSlot::with(['slot','mergeTimetableSlot'])->find($id);
            $timetableSlot->update($request->all());
            $timetableSlot->mergeTimetableSlot()->update($request->only(['start','end']));
            $timetableSlot->slot()->update($request->except(['start','end','duration']));
            DB::commit();
            return response()->json(['success'=>"update success"]);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
    public function deleteSlot($id){
        try {
            DB::beginTransaction();
            $timetableSlot = TimeTableSlot::find($id)->delete();
            DB::commit();
            return response(["status"=>"Delete Slot Successful"]);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
        }
    }
    //testing create slot
    public function createSlot(SlotRequest $request)
    {
        /**
         * TODO:
         * time_tp
         * time_td
         * time_course
         * academic_year_id
         * course_program_id
         *
         *
         *
         */
        $input = $request->validated();
        // return response()->json($input);
        try {
            DB::beginTransaction();
            $course = Course::find($input['course_program_id']);

            if ($request->type == "Course") $input['time_course'] = $course->time_course;
            elseif ($request->type == "TP") $input['time_tp'] = $course->time_tp;
            elseif ($request->type == "TD") $input['time_td'] = $course->time_td;
            $course_name = $course->name_en;
            $groupMerge = MergeTimeTableSlot::create([...$input]);
            $slot = Slot::create([...$input, 'created_uid' => 1]);
            //slot id
            $timeableSlot = TimeTableSlot::create([
                ...$input,
                'group_merge_id' => $groupMerge->id,
                "slot_id" => $slot->id,
                "course_name" => $course_name,
                'created_uid' => 1,
                "updated_uid" => 1,
            ]);
            DB::commit();
            return response()->json(['data' => $timeableSlot]);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
    //@List Slot
    public function list(Request $request)
    {
        $timeTP             = $request->input('time_tp');
        $timeTD             = $request->input('time_td');
        $academicYearId     = $request->input('academic_year_id');
        $courseProgramID    = $request->input('course_program_id');
        $semesterID         = $request->input('semester_id');
        $lecturerID         = $request->input('lecturer_id');
        $groupID            = $request->input('group_id');
        $timetableID        = $request->input('timetable_id');
        $roomID             = $request->input('room_id');

        $query = Slot::query();

        if (isset($timeTP)) {
            $query->where('time_tp', $timeTP);
        }
        if (isset($timeTD)) {
            $query->where('time_td', $timeTD);
        }
        if (isset($academicYearId)) {
            $query->where('academic_year_id', $academicYearId);
        }
        if (isset($courseProgramID)) {
            $query->where('course_program_id', $courseProgramID);
        }
        if (isset($semesterID)) {
            $query->where('semester_id', $semesterID);
        }
        if (isset($lecturerID)) {
            $query->where('lecturer_id', $lecturerID);
        }
        if (isset($groupID)) {
            $query->where('group_id', $groupID);
        }
        if (isset($timetableID)) {
            $query->where('timetable_id', $timetableID);
        }
        if (isset($roomID)) {
            $query->where('room_id', $roomID);
        }

        $slot = $query->get();

        if (count($slot) > 0) return response()->json($slot);
        return $this->create_slote($request);
    }



    // @create
    public function create_slote(Request $request)
    {
        $timeTP             = $request->input('time_tp');
        $timeTD             = $request->input('time_td');
        $timeCourse         = $request->input('time_course');
        $academicYearId     = $request->input('academic_year_id');
        $courseProgramID    = $request->input('course_program_id');
        $semesterID         = $request->input('semester_id');
        $lecturerID         = $request->input('lecturer_id', null);
        $groupID            = $request->input('group_id');
        $timeUsed           = $request->input('time_used');
        $timeRemaining      = $request->input('time_remaining');
        $created_UID        = $request->input('created_uid');
        $write_UID          = $request->input('write_uid');
        $timetableID        = $request->input('timetable_id', null);
        $roomID             = $request->input('room_id', null);
        $courseID           = $request->input('course_id', null);

        $dataToInsert = [
            'time_tp'               => $timeTP,
            'time_td'               => $timeTD,
            'time_course'           => $timeCourse,
            'academic_year_id'      => $academicYearId,
            'course_program_id'     => $courseProgramID,
            'semester_id'           => $semesterID,
            'lecturer_id'           => $lecturerID,
            'group_id'              => $groupID,
            'time_used'             => $timeUsed,
            'time_remaining'        => $timeRemaining,
            'created_uid'           => $created_UID,
            'write_uid'             => $write_UID,
            'timetable_id'          => $timetableID,
            'room_id'               => $roomID,
            'course_id'             => $courseID
        ];

        if (isset($lecturerID)) {
            $dataToInsert['lecturer_id'] = $lecturerID;
        }
        if (isset($timetableID)) {
            $dataToInsert['timetable_id'] = $timetableID;
        }
        if (isset($roomID)) {
            $dataToInsert['room_id'] = $roomID;
        }
        if (isset($courseID)) {
            $dataToInsert['course_id'] = $courseID;
        }
        Slot::create($dataToInsert);

        return response()->json(['message' => 'Slot created successfully']);
    }

    // @Get only one slot
    public function get_slot($id)
    {
        // Retrieve the slot by its ID
        $slot = Slot::find($id);

        // Check if the slot exists
        if (!$slot) {
            return response()->json(['message' => 'Slot not found'], 404);
        }

        // Return the slot as a JSON response
        return response()->json(['slot' => $slot]);
    }

    // @update
    public function update_slot(Request $request, $id)
    {
        // Retrieve the existing slot by its ID
        $slot = Slot::find($id);

        // Check if the slot exists
        if (!$slot) {
            return response()->json(['message' => 'Slot not found'], 404);
        }

        // $slot->lecturer_id = $request->lecturer_id;
        // $slot->group_id = $request->group_id;
        // $slot->save();

        // Get the updated data from the request
        $timeTP             = $request->input('time_tp');
        $timeTD             = $request->input('time_td');
        $timeCourse         = $request->input('time_course');
        $academicYearId     = $request->input('academic_year_id');
        $courseProgramID    = $request->input('course_program_id');
        $semesterID         = $request->input('semester_id');
        $lecturerID         = $request->input('lecturer_id', null);
        $groupID            = $request->input('group_id');
        $timeUsed           = $request->input('time_used');
        $timeRemaining      = $request->input('time_remaining');
        $created_UID        = $request->input('created_uid');
        $write_UID          = $request->input('write_uid');
        $timetableID        = $request->input('timetable_id', null);
        $roomID             = $request->input('room_id', null);
        $courseID           = $request->input('course_id', null);

        // Create an array with the updated data
        $dataToUpdate = [
            'time_tp'               => $timeTP,
            'time_td'               => $timeTD,
            'time_course'           => $timeCourse,
            'academic_year_id'      => $academicYearId,
            'course_program_id'     => $courseProgramID,
            'semester_id'           => $semesterID,
            'lecturer_id'           => $lecturerID,
            'group_id'              => $groupID,
            'time_used'             => $timeUsed,
            'time_remaining'        => $timeRemaining,
            'created_uid'           => $created_UID,
            'write_uid'             => $write_UID,
            'timetable_id'          => $timetableID,
            'room_id'               => $roomID,
            'course_id'             => $courseID
        ];

        // Update the slot with the new data
        $slot->update($dataToUpdate);

        return response()->json(['message' => 'Slot updated successfully']);
    }

    // @delete
    public function delete_slot($id)
    {
        // Retrieve the existing slot by its ID
        $slot = Slot::find($id);

        // Check if the slot exists
        if (!$slot) {
            return response()->json(['message' => 'Slot not found'], 404);
        }

        // Delete the slot
        $slot->delete();

        return response()->json(['message' => 'Slot deleted successfully']);
    }
}
