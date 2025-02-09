<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\applicant_apply;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class jobdescriptionController extends Controller
{
     public function index(Request $request){
 $id=$request->getid;

    $jobdesc = DB::select("SELECT * FROM `core1_recruitment`  where recruitment_id='$id'");

    $pageConfigs = ['myLayout' => 'blank'];
         return view('content.applicant.jobdescription-view',['pageConfigs' => $pageConfigs],['jobdesc' => $jobdesc]);
   }


   public function apply(Request $request){

 $id=Auth::user()->code_id;

     applicant_apply::create([
            'applicant_id' =>$id,
            'recruitment_id' =>$request->recruitment_id,
            'status' =>'Apply',
      
        ]);
   }
}
