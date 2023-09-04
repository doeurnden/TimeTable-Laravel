<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Degrees;

class DegreeController extends Controller
{
    public function index(){
        $degree = Degrees::all();
        // $degree = Degrees::SelectIdAndName()->get(); // Assuming you have a 'products' table
        return response()->json($degree);
    }
}
