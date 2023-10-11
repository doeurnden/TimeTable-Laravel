<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class TimeTableSlot extends Model
{
    use HasFactory;
    protected $table = 'timetable_slots';
    use QueryCacheable;
    public $cacheFor = 3600;
    protected $fillable = [
        'timetable_id',
        'course_program_id',
        'slot_id',
        'lecturer_id',
        'room_id',
        'group_merge_id',
        'course_name',
        'type',
        'durations',
        'start',
        'end',
        'created_uid',
        'updated_uid',
    ];

    // Define relationships if necessary

    public function timetable()
    {
        return $this->belongsTo(Timetable::class);
    }

    public function courseProgram()
    {
        return $this->belongsTo(CourseProgram::class);
    }

    public function slot()
    {
        return $this->belongsTo(Slot::class);
    }


    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

}
