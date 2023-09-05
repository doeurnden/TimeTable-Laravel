<?php

namespace App\Http\Controllers;
use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function list()
    {
        $buildings = Building::all();
        return response()->json($buildings);
    }
    public function listByID($id)
    {
        $buildings = Building::find($id);
        if (!$buildings) {
            return response()->json(['error' => 'Room not found'], 404);
        }
        return response()->json($buildings);
    }
}
