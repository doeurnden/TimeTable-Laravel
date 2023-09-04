<?php

namespace App\Http\Controllers;

use App\Models\DepartmentOptions;
use Illuminate\Http\Request;

class DepOptionController extends Controller
{
    public function index(){
        $departmentOption = DepartmentOptions::all();
        return response()->json($departmentOption);
    }
}
