<?php

namespace App\Http\Controllers;

use App\Models\Weeks;
use Illuminate\Http\Request;

class WeekController extends Controller
{
    public function index(){
        // $week = Week::SelectIdAndName()->get();
        $week = Weeks::all();
        return response()->json($week);
    }
}
