<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class Slot_Show extends Model
{
    protected $table = 'slots';
    use QueryCacheable;
    protected $primaryKey = 'id';
}
