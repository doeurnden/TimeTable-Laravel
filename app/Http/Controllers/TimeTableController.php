<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeTable;
use Illuminate\Support\Facades\DB;

class TimeTableController extends Controller
{
    //@Get all data from TimeTable
    // public function get_all_timetable()
    // {
    //     $timeTable = TimeTable::SelectTimeTable()->get();
    //     return response()->json($timeTable);
    // }

    //@GEt only one from TimeTable
    // public function get_one_timetable($id){
    //     $timeTable = TimeTable::find($id);
    //     if($timeTable){
    //         return response()->json(['message' => 'success','TimeTable'=>$timeTable]);
    //     }
    //     else{
    //         return response()->json(['message' => 'TimeTable '. $id. ' not found']);
    //     }
    // }

    //@Create TimeTable
    // public function create(Request $request)
    // {
    //     // Validate the incoming request data
    //     $this->validate($request, [
    //         'academic_year_id'  => 'required ',
    //         'department_id'     => 'required ',
    //         'degree_id'         => 'required ',
    //         'grade_id'          => 'required ',
    //         'semester_id'       => 'required ',
    //         'week_id'           => 'required ',
    //         'completed'         => 'required ',
    //         'created_uid'       => 'required ',
    //         'updated_uid'       => 'required ',
    //         'created_at'        => 'required ',
    //         'updated_at'        => 'required ',

    //         // Add more validation rules for other fields as needed
    //     ]);

    //     // Create a new timetable entry
    //     $timeTable = new TimeTable;
    //     $timeTable->academic_year_id = $request->input('academic_year_id');
    //     $timeTable->department_id = $request->input('department_id');
    //     $timeTable->degree_id = $request->input('degree_id');
    //     $timeTable->grade_id = $request->input('grade_id');
    //     $timeTable->semester_id = $request->input('semester_id');
    //     $timeTable->week_id = $request->input('week_id');
    //     $timeTable->completed = $request->input('completed');
    //     $timeTable->created_uid = $request->input('created_uid');
    //     $timeTable->updated_uid = $request->input('updated_uid');
    //     $timeTable->created_at = $request->input('created_at');
    //     $timeTable->updated_at = $request->input('updated_at');
    //     // Set other fields as needed

    //     // Save the timetable entry to the database
    //     $timeTable->save();

    //     return response()->json(['message' => 'Timetable created successfully', 'TimeTable' => $timeTable]);
    // }

    //@Update data on TimeTable
    // public function update(Request $request, $id){
    //     $this->validate($request, [
    //         'academic_year_id'  => 'required',
    //         'department_id'     => 'required',
    //         'degree_id'         => 'required',
    //         'grade_id'          => 'required',
    //         'semester_id'       => 'required',
    //         'week_id'           => 'required',
    //         'completed'         => 'required',
    //         'created_uid'       => 'required',
    //         'updated_uid'       => 'required',
    //     ]);

    //     $timeTable = TimeTable::find($id);
    //     if(!$timeTable){
    //         return response()->json(['message'=>'TimeTable update not success']);
    //     }

    //     $timeTable->academic_year_id = $request->academic_year_id;
    //     $timeTable->department_id    = $request->department_id;
    //     $timeTable->degree_id        = $request->degree_id;
    //     $timeTable->grade_id         = $request->grade_id;
    //     $timeTable->semester_id      = $request->semester_id;
    //     $timeTable->week_id          = $request->week_id;
    //     $timeTable->completed        = $request->completed;
    //     $timeTable->created_uid      = $request->created_uid;
    //     $timeTable->updated_uid      = $request->updated_uid;
    //     $timeTable->save();

    //     return response()->json(['message'=>'TimeTable updated successfully','TimeTable'=>$timeTable]);
    // }

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

    public function getAll_TimeTable(Request $request)
    {
        $academicYearId     = $request->input('academic_year_id');
        $departmentId       = $request->input('department_id');
        $degreeId           = $request->input('degree_id');
        $departmentOptionId = $request->input('department_option_id'); // Set to null initially
        $gradeId            = $request->input('grade_id');
        $semesterId         = $request->input('semester_id');
        $groupeId           = $request->input('group_id');
        $weekId             = $request->input('week_id');

        // Check if data exists in the database
        $query = Timetable::query();
        if (isset($academicYearId)) {
            $query=$query->where('academic_year_id', $academicYearId);
        }

        if (isset($departmentId)) {
            $query=$query->where('department_id', $departmentId);
        }

        if (isset($degreeId)) {
            $query=$query->where('degree_id', $degreeId);
        }
        if (isset($departmentOptionId)) {
            // Use the departmentOption parameter to filter by department
            $query=$query->where('option_id', $departmentOptionId);
        }
        if (isset($gradeId)) {
            $query=$query->where('grade_id', $gradeId);
        }

        if (isset($semesterId)) {
           $query= $query->where('semester_id', $semesterId);
        }
        if (isset($groupeId)) {
           $query= $query->where('group_id', $groupeId);
        }
        if (isset($weekId)) {
           $query= $query->where('week_id', $weekId);
        }

        $timetables = $query->get();
        if (count($timetables) > 0) return response()->json($timetables);

        return response()->json([$this->insertTimetableData($request)]);
        // try {
        // } catch (\Throwable $th) {
        // }
    }

    public function insertTimetableData(Request $request)
    {
        $academicYearId     = $request->input('academic_year_id');
        $departmentId       = $request->input('department_id');
        $degreeId           = $request->input('degree_id');
        $departmentOptionId = $request->input('department_option_id', null); // Set to null initially
        $gradeId            = $request->input('grade_id');
        $semesterId         = $request->input('semester_id');
        $groupeId           = $request->input('group_id');
        $weekId             = $request->input('week_id');
        $created_UID        = $request->input('created_uid');
        $updated_UID        = $request->input('updated_uid');

        // Create an array to hold the data to insert
        $dataToInsert = [
            'academic_year_id' => $academicYearId,
            'department_id'    => $departmentId,
            'degree_id'        => $degreeId,
            'grade_id'         => $gradeId,
            'semester_id'      => $semesterId,
            'group_id'         => $groupeId,
            'week_id'          => $weekId,
            'created_uid'      => $created_UID,
            'updated_uid'      => $updated_UID
        ];

        if (isset($departmentOptionId)) {
            $dataToInsert['option_id'] = $departmentOptionId;
        }
        try {
            //code...
            return collect(Timetable::create($dataToInsert))->toArray();
        } catch (\Throwable $th) {
            //throw $th;
            return $th;
        }
        // Insert the data into the Timetable model

        // return response()->json(['message' => 'Data inserted successfully']);
    }
}
