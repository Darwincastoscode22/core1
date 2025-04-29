<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class scheduleexam extends Model
{
    use HasFactory;

        protected $table="core1_applicant_schedule_exam";
    protected $fillable = [
        'schedule_id',
        'applicant_id',
        'exam_date',
         'status',
        
               
    ];

}
