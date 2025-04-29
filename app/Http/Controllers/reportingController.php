<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class reportingController extends Controller
{
    
      public function index(){

     $applicant = DB::select("SELECT *,core1_applicant_apply.status as  applystatus FROM `core1_applicant_apply`  inner  JOIN core1_applicant on  core1_applicant.applicant_code=core1_applicant_apply.applicant_id INNER JOIN core1_recruitment on core1_recruitment.recruitment_id=core1_applicant_apply.recruitment_id where core1_applicant_apply.status='Pending' || core1_applicant_apply.status='Reject' || core1_applicant_apply.status='Failed' ");
         return view('content.core.reporting-view',['applicant'=>$applicant]);
   }
}
