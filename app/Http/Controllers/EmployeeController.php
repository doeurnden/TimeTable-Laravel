<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    // public function get_lecturer(){
    //     return Employee::with(['gender', 'department']); // Change 10 to the desired number of items per page
    // }

    public function get_lecturer(){
        return Employee::select('id','name_latin', 'gender_id', 'department_id','id_card')
        ->with('gender:id,code','department:id,code')
        ->whereNotNull('gender_id')
        ->where('department_id',4) //check condition with department
        ->orderBy('id','asc')
        ->get();
    }
}
