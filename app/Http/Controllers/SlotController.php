<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slot;
use Illuminate\Support\Facades\Validator;

class SlotController extends Controller
{
    public function list()
    {
        $slots = Slot::all();
        return response()->json($slots);
    }
    public function listByID($id)
    {
        $slots = Slot::find($id);
        if (!$slots) {
            return response()->json(['error' => 'Slot not found'], 404);
        }
        return response()->json($slots);
    }

    public function create(){
        return Slot::get();
    }

    public function move(){

    }
}
