<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\applicant_apply;
use DateTime;
use DateTimeZone;
class applicantController extends Controller
{
    public function index(){

     $applicant = DB::select("SELECT *,core1_applicant_apply.status as  applystatus FROM `core1_applicant_apply`  inner  JOIN core1_applicant on  core1_applicant.applicant_code=core1_applicant_apply.applicant_id INNER JOIN core1_recruitment on core1_recruitment.recruitment_id=core1_applicant_apply.recruitment_id where core1_applicant_apply.status='Pending' || core1_applicant_apply.status='Reject' || core1_applicant_apply.status='Failed' ");
         return view('content.core.applicant-view',['applicant'=>$applicant]);
   }




 public function reject(Request $request){
$id=$request->reject_id;
       $reject = applicant_apply::where('applicant_apply_id',$id);
       if(!$reject){
             return abort(404);
      }
      $reject->update(['status' =>'Failed',]);
      return back();


}

public function approved(Request $request){
       $date = new DateTime('now', new DateTimeZone('Asia/Manila'));
       $Date=$date->format('Y-m-d h:i:s');
       $id=$request->approved_id;
       $approved = applicant_apply::where('applicant_apply_id',$id);
       if(!$approved){
             return abort(404);
      }
      $approved->update(['status' =>'Passed','date_hired' =>$Date,]);
      return back();
}

public function hired(Request $request){

       $id=$request->hired_id;
       $hired = applicant_apply::where('applicant_apply_id',$id);
       if(!$hired){
             return abort(404);
      }
      $hired->update(['status' =>'Reject',]);
      return back();
}



}
