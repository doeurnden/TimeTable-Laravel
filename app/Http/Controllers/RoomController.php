<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function get_room()
    {
        return Room::select('id', 'name', 'nb_desk', 'nb_chair', 'room_type_id', 'building_id')
            ->with('roomType:id,name','building:id,code')
            ->orderBy('room_type_id', 'asc')
            ->orderBy('building_id', 'asc')
            ->get();
    }
}
