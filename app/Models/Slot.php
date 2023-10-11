<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class Slot extends Model
{
    use HasFactory;
    protected $table = 'slots';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    use QueryCacheable;
    protected $fillable = [
        'time_tp',
        'time_td',
        'time_course',
        'academic_year_id',
        'course_program_id',
        'semester_id',
        'lecturer_id',
        'group_id',
        'time_used',
        'time_remaining',
        'created_uid',
        'write_uid',
        'created_at',
        'updated_at',
        'timetable_id',
        'room_id',
        'course_id'
    ];

    // Relationships
    // public function academicYear()
    // {
    //     return $this->belongsTo(AcademicYear::class, 'academic_year_id');//M:1
    // }

    // public function courseProgram()
    // {
    //     return $this->belongsTo(Course::class, 'course_program_id');
    // }

    // public function semester()
    // {
    //     return $this->belongsTo(Semester::class, 'semester_id');
    // }

    // public function lecturer()
    // {
    //     return $this->belongsTo(Lecturer::class, 'lect
    //     urer_id');
    // }

    // public function group()
    // {
    //     return $this->belongsTo(Group::class, 'group_id');
    // }
}
