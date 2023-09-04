<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;
    protected $table = 'buildings';
    public $timestamps = false;// You can set this to true if you want to use Laravel's timestamps.

    // protected $fillable = [
    //     'name',
    //     'description',
    //     'created_at',
    //     'updated_at',
    //     'active',
    //     'create_uid',
    //     'write_uid',
    //     'code',
    // ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'create_uid');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'write_uid');
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
