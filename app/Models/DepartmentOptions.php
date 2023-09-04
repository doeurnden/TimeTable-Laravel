<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentOptions extends Model
{
    use HasFactory;
    protected $table   = 'departmentOptions';
    protected $guraded = ["id"];
}
