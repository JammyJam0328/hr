<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }
    public function leavecredits()
    {
        return $this->hasMany(LeaveCredit::class);
    }
}