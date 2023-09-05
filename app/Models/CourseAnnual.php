<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseAnnual extends Model
{
    use HasFactory;
    protected $table = 'course_annuals';

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
