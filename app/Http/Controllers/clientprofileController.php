<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\signup;
use App\Models\User;
class clientprofileController extends Controller
{


        public function index()
  {

    $id=Auth::user()->code_id;

  $profiles = DB::select("select  * FROM  core1_applicant where  applicant_code='$id' ");

      $pageConfigs = ['myLayout' => 'blank'];
          return view('content.applicant.applicant-profile',['profiles' =>$profiles],['pageConfigs' => $pageConfigs]);

        }



//Store image
    public function storeImage(Request $request){
  
        if($request->file('image')){
            $file= $request->file('image');
            $filename=$file->getClientOriginalName();
            $file-> move(public_path('assets\img'), $filename);
            $data['image']= $filename;
            $get=$_FILES["image"]["name"];
$id=$request->applicant_id;

$app = signup::where('applicant_id',$id);
        if(!$app){
               return abort(404);
             }
        $app->update([
            'image' =>$get,
        ]);

        }

    return back();
       
    }


        public function storefile(Request $request){



        $file = $request->file('resume');

        $fileName = time() . '_' . $file->getClientOriginalName();
     $file-> move(public_path('assets\img'),$fileName);
       

$id=$request->applicant_id;
  DB::select("update core1_applicant set resume='$fileName' where  applicant_id='$id'");
        return redirect()->back()->with('message', 'File uploaded successfully.');
    }
  
     

       



    
public function update(Request $request){
$user_id=Auth::user()->id;
$id=$request->client_id;
 $update = signup::where('client_id',$id);
  $user = User::where('id',$user_id)->first();
        if(!$update){
               return abort(404);
             }
        $update->update([
            'firstname' => $request->first,
            'middlename' => $request->middle,
            'lastname' => $request->last,
            'company_address' => $request->company_address,
            'email' => $request->email,
            'contact' => $request->contact,
   
        ]);

   $user->update([
            'email' =>$request->email,
        ]);
    return back();


    }

  


}
