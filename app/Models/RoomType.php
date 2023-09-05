<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;
    protected $table = 'roomTypes';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function creator()
    {
        return $this->belongsTo(User::class, 'create_uid');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'write_uid');
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
