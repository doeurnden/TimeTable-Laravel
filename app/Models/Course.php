<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class Course extends Model
{
    use HasFactory;
    use QueryCacheable;
    public $cacheFor = 3600;

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'create_uid');
    }

    public function departmentOption()
    {
        return $this->belongsTo(DepartmentOption::class, 'department_option_id');
    }

    // public function responsibleDepartment()
    // {
    //     return $this->belongsTo(Department::class, 'responsible_department_id');
    // }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'write_uid');
    }
}
