<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\scheduleexam;

class scheduleexamController extends Controller
{
          public function index(){


    $schedule= DB::select("SELECT * FROM `core1_applicant` inner join core1_applicant_schedule_exam on  core1_applicant_schedule_exam.applicant_id=core1_applicant.applicant_code");
       return view('content.core.schedule-view',compact('schedule'));
   }


     public function storeschedule(Request $request)
    {
      scheduleexam::create([
            'applicant_id'=>$request->empid,
            'exam_date'=>$request->interview,
       
        ]);
    return redirect()->back();
    }
}
