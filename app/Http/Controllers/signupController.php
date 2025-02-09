<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\signup;

class signupController extends Controller
{

 public function index(){
      $pageConfigs = ['myLayout' => 'blank'];
          return view('content.applicant.signup-view',['pageConfigs' => $pageConfigs]);
        }

public function store(Request $request){
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

   $random =substr(str_shuffle(str_repeat($pool, 5)), 0, 8);
        signup::create([
            'applicant_code' =>$random,
            'firstname' => $request->first,
            'middlename' => $request->middle,
            'lastname' => $request->last,
            'address' => $request->address,
            'contact' => $request->contact,
            'email' => $request->email,
            'civil_status' => $request->civil_status,
                  'age' => $request->age,
            'gender' => $request->gender,
        ]);
$gg=$request->first;
          User::create([
            'name' =>$request->first,
            'code_id' =>$random,
            'password' => $request->password,
            'email' => $request->email,
             'role'=>'applicant',
        ]);
          return back();
  
    }

}
