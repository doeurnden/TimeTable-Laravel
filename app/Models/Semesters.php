<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semesters extends Model
{
    use HasFactory;
    protected $table   = 'semesters';
    protected $fillable = ['name_kh','name_en','name_fr','created_at','updated_at','active','create_uid','write_uid'];
}
