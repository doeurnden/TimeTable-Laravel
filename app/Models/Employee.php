<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class Employee extends Model
{
    use HasFactory;
    use QueryCacheable;
    public $cacheFor = 3600;
    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function createUid()
    {
        return $this->belongsTo(User::class, 'create_uid');
    }

    public function writeUid()
    {
        return $this->belongsTo(User::class, 'write_uid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function payslipClient()
    {
        return $this->belongsTo(PayslipClient::class, 'payslip_client_id');
    }

    public function title()
    {
        return $this->belongsTo(Title::class, 'title_id');
    }
}
