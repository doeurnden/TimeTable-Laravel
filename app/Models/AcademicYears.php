<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class AcademicYears extends Model
{
    use QueryCacheable;
    use HasFactory;
    public $cacheFor = 3600;
    protected $table   = 'academicYears';
    protected $fillable = ['name_kh','name_latin','date_start','date_end','description','active','created_at','updated_at','create_uid','write_uid'];

    public function scopeSelectAll($query)
    {
        return $query->select('id','name_kh','name_latin','date_start','date_end','description','active','created_at','updated_at','create_uid','write_uid')->orderBy('id','desc');
    }
}
