<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class Semesters extends Model
{
    use HasFactory;
    use QueryCacheable;
    public $cacheFor = 3600;
    protected $table   = 'semesters';
    protected $fillable = ['name_kh','name_en','name_fr','created_at','updated_at','active','create_uid','write_uid'];
}
