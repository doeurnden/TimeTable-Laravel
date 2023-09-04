<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';
    public $timestamps = false; // You can set this to true if you want to use Laravel's timestamps.

    public function building()
    {
        return $this->belongsTo(Building::class, 'building_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'create_uid');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function roomType()
    {
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'write_uid');
    }
}
