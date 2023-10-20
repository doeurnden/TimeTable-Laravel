<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class DepartmentOptions extends Model
{
    use HasFactory;
    use QueryCacheable;
    public $cacheFor = 3600;


    protected $table   = 'departmentOptions';
    protected $guraded = ["id"];
}
