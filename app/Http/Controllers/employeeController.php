<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class employeeController extends Controller
{
public function index(){
$employee = DB::select("SELECT *,core2_contract.status as  applicant_status FROM `core1_applicant`  INNER JOIN  core2_contract on core2_contract.employee_id=core1_applicant.applicant_id   INNER JOIN core1_applicant_apply on core1_applicant_apply.applicant_id  INNER JOIN core1_recruitment on  core1_applicant_apply.recruitment_id=core1_recruitment.recruitment_id where  core2_contract.status='Hired'");
         return view('content.core.employee-view',compact('employee'));
   }


}
