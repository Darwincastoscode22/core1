<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class applicant_apply extends Model
{
    use HasFactory;


       protected $table="core1_applicant_apply";

 protected $fillable = [
        'applicant_apply_id',
        'recruitment_id',
        'applicant_id',
        'status',
          'date_hired',
    
        
    ];



 }
