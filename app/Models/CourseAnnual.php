<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class CourseAnnual extends Model
{
    use HasFactory;
    protected $table = 'course_annuals';
    use QueryCacheable;
    public $cacheFor = 3600;


    protected $fillable = [
        'name', 'semester_id', 'created_at', 'updated_at', 'active', 'academic_year_id',
        'employee_id', 'create_uid', 'write_uid', 'course_id', 'score_percentage_column_1',
        'score_percentage_column_2', 'score_percentage_column_3', 'time_tp', 'time_td',
        'time_course', 'name_kh', 'name_en', 'name_fr', 'credit', 'department_id',
        'degree_id', 'grade_id', 'department_option_id', 'responsible_department_id',
        'is_counted_absence', 'is_counted_creditability', 'is_having_resitted',
        'reference_course_id', 'competency_type_id', 'normal_scoring', 'is_allow_scoring',
        'is_elective',
    ];

    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class, 'academic_year_id');
    }

    public function competencyType()
    {
        return $this->belongsTo(CompetencyType::class, 'competency_type_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'create_uid');
    }

    public function degree()
    {
        return $this->belongsTo(Degree::class, 'degree_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function departmentOption()
    {
        return $this->belongsTo(DepartmentOption::class, 'department_option_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    public function responsibleDepartment()
    {
        return $this->belongsTo(Department::class, 'responsible_department_id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'write_uid');
    }
}
