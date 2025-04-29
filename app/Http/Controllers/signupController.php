<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\signup;
use DateTime;
use DateTimeZone;
use Illuminate\Database\QueryException;

class signupController extends Controller
{

 public function index(){
      $pageConfigs = ['myLayout' => 'blank'];
          return view('content.applicant.signup-view',['pageConfigs' => $pageConfigs]);
        }

public function store(Request $request){
    try{
            $date = new DateTime('now', new DateTimeZone('Asia/Manila'));
$Date=$date->format('Ymdhis');
        signup::create([
            'applicant_code' =>$Date,
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
            'code_id' =>$Date,
            'password' => $request->password,
            'email' => $request->email,
             'role'=>'applicant',
        ]);
        
           return redirect()->back()->with('alert', 'SUCCESS REGISTER');

          } catch (QueryException $e) {
    if ($e->getCode() == 23000) { // Unique constraint violation
          return redirect()->back()->with('alert', 'Oops! This email already exists.');
    }
}


  
    }



}
