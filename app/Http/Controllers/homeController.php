<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class homeController extends Controller
{
     public function index()
  {
     

      $job = DB::select("SELECT * FROM `core1_recruitment` where status='Post'");

      $pageConfigs = ['myLayout' => 'blank'];
          return view('content.applicant.home-view',['job'=>$job],['pageConfigs' => $pageConfigs]);

        }



public function login(Request $request){

// dd('test post', $request->all());

  $user = User::where('email', $request->email)->first();

  // dd($user);

  if(!$user){

    // TODO:
    return back()->with('error', 'user not found');
  }



  if(!Hash::check($request->password, $user->password)){
    return back()->with('error', 'incorrect credential');
  }


if($user->role=='admin'){
  Auth::login($user);
  return redirect('/dashboard/crm');
  //dd("asasa");
}else{
  Auth::login($user);
   return redirect('/');
   }
 }


}
