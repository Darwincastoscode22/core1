<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class applicantController extends Controller
{
    public function index(){

     $applicant = DB::select("SELECT *,core1_applicant_apply.status as  applystatus FROM `core1_applicant_apply`  inner  JOIN core1_applicant on  core1_applicant.applicant_code=core1_applicant_apply.applicant_id INNER JOIN core1_recruitment on core1_recruitment.recruitment_id=core1_applicant_apply.recruitment_id");
         return view('content.core.applicant-view',['applicant'=>$applicant]);
   }




}
