<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\applicant_apply;
class newhireController extends Controller
{
  public function index(){

$newEmployees = DB::select("SELECT *,core1_applicant_apply.status as applicant_status,core1_applicant_apply.applicant_id as appid,core1_recruitment.department as dep FROM `core1_recruitment` INNER  JOIN  core1_applicant_apply on  core1_applicant_apply.recruitment_id=core1_recruitment.recruitment_id INNER JOIN core1_applicant on
core1_applicant.applicant_code=core1_applicant_apply.applicant_id  where core1_applicant_apply.status='Passed' || core1_applicant_apply.status='Qualified'");
         return view('content.core.newhire-view',compact('newEmployees'));
   }

   public function deploy(Request $request){

       $id=$request->deployed;
       $approved = applicant_apply::where('applicant_apply_id',$id);
       if(!$approved){
             return abort(404);
      }
      $approved->update(['status' =>'Qualified',]);
      return back();
}

}
