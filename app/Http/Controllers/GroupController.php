<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index(){
        $group = Groups::all();
        return response()->json($group);
    }
}
