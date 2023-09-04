<?php

namespace App\Http\Controllers;

use App\Models\Semesters;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function index(){
        // $semester = Semesters::SelectIdAndName()->get();
        $semester = Semesters::all();
        return response()->json($semester);
    }
}
