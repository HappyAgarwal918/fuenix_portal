<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    use HasFactory;

    protected $table = 'user_info';

    protected $fillable = ['user_id','company_email','id_number','linkedIn','aadhar_number','aadhar_front','aadhar_back','pan_number','pan_card','resume','degree_certificate','offer_letter'];

    // public $timestamps = false;
}
