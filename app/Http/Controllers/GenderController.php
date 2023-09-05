<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gender;
class GenderController extends Controller
{
    public function list() {
        $genders = Gender::all();
        return response()->json($genders);
    }
}
