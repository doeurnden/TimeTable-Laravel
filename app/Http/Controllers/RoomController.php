<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\FunctionNode;

class RoomController extends Controller
{
    public function get_room()
    {
        return Room::select('id', 'name', 'nb_desk', 'nb_chair', 'room_type_id', 'building_id')
            ->with('roomType:id,name', 'building:id,code')
            ->orderBy('id', 'asc')
            ->orderBy('room_type_id', 'asc')
            ->orderBy('building_id', 'asc')
            ->get();
    }

    public function insert_room_into_timetable_slot($id)
    {
        // return Room::select('id', 'name','building_id')
        //     ->with('building:id,code')
        //     ->orderBy('building_id', 'asc')
        //     ->find($id);

        $allRooms = $this->get_room();

        // Use additional conditions to filter the rooms
        $filteredRooms = $allRooms->where('id', $id);

        // Return the filtered room(s)
        return $filteredRooms->first();
    }
}
