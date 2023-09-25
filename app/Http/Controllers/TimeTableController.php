<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeTable;

class TimeTableController extends Controller
{
    //@Get all data from TimeTable
    public function get_all_timetable()
    {
        $timeTable = TimeTable::SelectTimeTable()->get();
        return response()->json($timeTable);
    }

    //@GEt only one from TimeTable
    public function get_one_timetable($id){
        $timeTable = TimeTable::find($id);
        if($timeTable){
            return response()->json(['message' => 'success','TimeTable'=>$timeTable]);
        }
        else{
            return response()->json(['message' => 'TimeTable '. $id. ' not found']);
        }
    }

    //@Create TimeTable
    public function create(Request $request)
    {
        // Validate the incoming request data
        $this->validate($request, [
            'academic_year_id'  => 'required',
            'department_id'     => 'required',
            'degree_id'         => 'required',
            'grade_id'          => 'required',
            'semester_id'       => 'required',
            'week_id'           => 'required',
            'completed'         => 'required',
            'created_uid'       => 'required',
            'updated_uid'       => 'required',
            'created_at'        => 'required',
            'updated_at'        => 'required',
            // Add more validation rules for other fields as needed
        ]);

        // Create a new timetable entry
        $timeTable = new TimeTable;
        $timeTable->academic_year_id = $request->input('academic_year_id');
        $timeTable->department_id = $request->input('department_id');
        $timeTable->degree_id = $request->input('degree_id');
        $timeTable->grade_id = $request->input('grade_id');
        $timeTable->semester_id = $request->input('semester_id');
        $timeTable->week_id = $request->input('week_id');
        $timeTable->completed = $request->input('completed');
        $timeTable->created_uid = $request->input('created_uid');
        $timeTable->updated_uid = $request->input('updated_uid');
        $timeTable->created_at = $request->input('created_at');
        $timeTable->updated_at = $request->input('updated_at');
        // Set other fields as needed

        // Save the timetable entry to the database
        $timeTable->save();

        return response()->json(['message' => 'Timetable created successfully', 'TimeTable' => $timeTable]);
    }

    //@Update data on TimeTable
    public function update(Request $request, $id){
        $this->validate($request, [
            'academic_year_id'  => 'required',
            'department_id'     => 'required',
            'degree_id'         => 'required',
            'grade_id'          => 'required',
            'semester_id'       => 'required',
            'week_id'           => 'required',
            'completed'         => 'required',
            'created_uid'       => 'required',
            'updated_uid'       => 'required',
        ]); 

        $timeTable = TimeTable::find($id);
        if(!$timeTable){
            return response()->json(['message'=>'TimeTable update not success']);
        }

        $timeTable->academic_year_id = $request->academic_year_id;
        $timeTable->department_id    = $request->department_id;
        $timeTable->degree_id        = $request->degree_id;
        $timeTable->grade_id         = $request->grade_id;
        $timeTable->semester_id      = $request->semester_id;
        $timeTable->week_id          = $request->week_id;
        $timeTable->completed        = $request->completed;
        $timeTable->created_uid      = $request->created_uid;
        $timeTable->updated_uid      = $request->updated_uid;
        $timeTable->save();

        return response()->json(['message'=>'TimeTable updated successfully','TimeTable'=>$timeTable]);
    }

    //@Delete TimeTable
    // public function delete($id){
    //     $timeTable = TimeTable::destroy($id);
    //     if($timeTable){
    //         return response()->json(['message' => 'Timetable deleted successfully']);
    //     }
    //     else{
    //         return response()->json(['message' => 'Table not found'])
    //     }
    // }
}        