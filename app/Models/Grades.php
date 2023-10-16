<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class Grades extends Model
{
    use QueryCacheable;
    use HasFactory;
    public $cacheFor=3600;
    protected $table = 'grades';
    protected $fillable = ['name_kh','name_en','name_fr','code','description','active','created_at','updated_at','create_uid','write_uid'];

    public function scopeSelectAll($query)
    {
        return $query->select('id','name_kh','name_en','name_fr','code','description','active','created_at','updated_at','create_uid','write_uid')->orderBy('id','asc');
    }
}
