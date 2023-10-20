<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class MergeTimeTableSlot extends Model
{
    use HasFactory;
    use QueryCacheable;
    protected $table="merge_timetable_slots";
    protected $fillable=[
        'start','end'
    ];
}
