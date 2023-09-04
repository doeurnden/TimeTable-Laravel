<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeTable extends Model
{
    use HasFactory;
    protected $table = 'timetables';
    protected $primaryKey = 'id';
    public $timestamps = false;

    // protected $fillable = [
    //     'academic_year_id',
    //     'department_id',
    //     'degree_id',
    //     'grade_id',
    //     'option_id',
    //     'semester_id',
    //     'week_id',
    //     'group_id',
    //     'completed',
    //     'created_uid',
    //     'updated_uid',
    //     'created_at',
    //     'updated_at',
    // ];

    // Relationships
    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class, 'academic_year_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function degree()
    {
        return $this->belongsTo(Degree::class, 'degree_id');
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    public function option()
    {
        return $this->belongsTo(DepartmentOption::class, 'option_id');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id');
    }

    public function week()
    {
        return $this->belongsTo(Week::class, 'week_id');
    }
}
