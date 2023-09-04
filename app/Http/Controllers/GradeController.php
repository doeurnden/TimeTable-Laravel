<?php

namespace App\Http\Controllers;

use App\Models\Grades;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index(){
        $grade = Grades::SelectAll()->get();
        return response()->json($grade);
    }
}
