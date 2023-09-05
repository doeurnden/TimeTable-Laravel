<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;

class RoomTypeController extends Controller
{
    public function list()
    {
        $roomsType = RoomType::all();
        return response()->json($roomsType);
    }
    public function listByID($id)
    {
        $roomsType = RoomType::find($id);
        if (!$roomsType) {
            return response()->json(['error' => 'Room not found'], 404);
        }
        return response()->json($roomsType);
    }

    //list rooms
    public function listRoom($id)
    {
        return RoomType::with(['rooms.building'])->where('id', '=', $id)->get();
    }
    public function listRooms()
    {
        return RoomType::with(['rooms.building'])->get();
    }
}
