<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class StudentAnnuals extends Model
{
    use QueryCacheable;
    use HasFactory;
    public $cacheFor = 3600;
    protected $table="studentAnnuals";
    protected $fillable=[
        'department_id',
    ];
}
