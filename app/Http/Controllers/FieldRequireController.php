<?php

namespace App\Http\Controllers;

use App\Models\AcademicYears;
use App\Models\Degrees;
use App\Models\Department;
use App\Models\DepartmentOptions;
use App\Models\Departments;
use App\Models\Grades;
use App\Models\Semesters;
use Illuminate\Http\Request;

class FieldRequireController extends Controller
{
    //
    public function index(){
        $department=Departments::selectIdAndName()->get();
        return response()->json([
            "semesters"=>Semesters::get(),
            "academic_years"=>AcademicYears::orderBy('id','desc')->get(),
            "departments"=>$department,
            "department_options"=>DepartmentOptions::get(),
            "grades"=>Grades::get(),
            "semesters"=>Semesters::get(),
            "degrees"=>Degrees::get(),
        ]);
    }
}
