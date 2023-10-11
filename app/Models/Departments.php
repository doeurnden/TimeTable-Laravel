<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class Departments extends Model
{
    use HasFactory;
    protected $table    = 'departments';
    use QueryCacheable;
    protected $fillable = ['name_kh','name_en','name_fr','code','description','is_specialist','active','created_at','updated_at','parent_id','school_id','create_uid','write_uid','is_vocational','order'];

    public function scopeSelectIdAndName($query){
        return $query->select('id','name_kh','name_en','name_fr','code','description','is_specialist','active','created_at','updated_at','parent_id','school_id','create_uid','write_uid','is_vocational','order')->orderBy('id','asc'); // Use 'name_kh' instead of 'name_en'
    }
}
