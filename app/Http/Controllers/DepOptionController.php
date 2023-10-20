<?php

namespace App\Http\Controllers;

use App\Models\DepartmentOptions;
use Illuminate\Http\Request;

class DepOptionController extends Controller
{
    public function index(){
        $departmentOption = DepartmentOptions::get();
        return response()->json($departmentOption);
    }
}
