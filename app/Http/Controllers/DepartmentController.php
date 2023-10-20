<?php

namespace App\Http\Controllers;

// use App\Models\Departments;

use App\Models\Departments;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(){
        $department = Departments::selectIdAndName()->get();
        return response()->json($department);
    }
}
