<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\interview;
use DateTime;
use DateTimeZone;


class interviewController extends Controller
{
    //
       public function index(){


    $interview= DB::select("SELECT *,core1_applicant_interview.status as st FROM `core1_applicant` inner join core1_applicant_interview on  core1_applicant_interview.applicant_id=core1_applicant.applicant_code");

       return view('content.core.interview-view',compact('interview'));
   }


     public function storeinterview(Request $request)
    {
      interview::create([
            'applicant_id'=>$request->empid,
            'interview_date'=>$request->interview,
            'status'=>'Pending',
       
        ]);
    return redirect()->back();
    }


public function interviewpassed(Request $request){
       $date = new DateTime('now', new DateTimeZone('Asia/Manila'));
       $Date=$date->format('Y-m-d h:i:s');
       $id=$request->approved_id;
       $approved = interview::where('interview_id',$id);
       if(!$approved){
             return abort(404);
      }
      $approved->update(['status' =>'Passed',]);
      return back();
}

public function interviewfailed(Request $request){

       $id=$request->failed_id;
       $hired = interview::where('interview_id',$id);
       if(!$hired){
             return abort(404);
      }
      $hired->update(['status' =>'Failed',]);
      return back();
}

}
