<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class Department extends Model
{
    use HasFactory;
    use QueryCacheable;
    public $cacheFor = 3600;
    protected $table = 'departments';
    protected $fillable = [
        'name_kh',
        'name_en',
        'name_fr',
        'code',
        'description',
        'is_specialist',
        'active',
        'created_at',
        'updated_at',
        'parent_id',
        'school_id',
        'create_uid',
        'write_uid',
        'is_vocational',
        'order',
    ];

    // Define relationships here, if applicable
    // For example, if you have a parent-child relationship:
    public function parent()
    {
        return $this->belongsTo(Department::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Department::class, 'parent_id');
    }
}
