<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class interview extends Model
{
  
   use HasFactory;


        protected $table="core1_applicant_interview";
    protected $fillable = [
        'interview_id',
        'applicant_id',
        'interview_date',
         'status',
        
               
    ];



}
