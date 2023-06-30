<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class total_attendance_days extends Model
{
    use HasFactory;

    protected $table = 'total_days_attendance';

    protected $fillable = ['days','date'];

    // public $timestamps = false;
}
