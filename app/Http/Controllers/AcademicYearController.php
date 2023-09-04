<?php

namespace App\Http\Controllers;

use App\Models\AcademicYears;
use Illuminate\Http\Request;

class AcademicYearController extends Controller
{
    public function index(){
        $academicyears = AcademicYears::selectAll()->get();
        return response()->json($academicyears);
    }
}
