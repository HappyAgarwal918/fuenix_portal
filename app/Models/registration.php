<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registration extends Model
{
    use HasFactory;

    protected $table = 'registration';

    protected $fillable = ['f_name','l_name','email','gender','qualification','course','duration','total_fees','aadhar_number','aadhar_front','aadhar_back','signature','coordinator'];

    // public $timestamps = false;
}
