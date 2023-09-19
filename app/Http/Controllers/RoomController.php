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
            ->paginate();
    }
    public function get_room_by_id($id){
        $Room = $this->get_room();
        $filteredRooms = $Room->where('id', $id);

        return $filteredRooms->first();
    }

    public function insert_room_into_timetable_slot($id)
    {
        $allRooms = $this->get_room();
        $filteredRooms = $allRooms->where('id', $id);

        return $filteredRooms->first();
    }
}
