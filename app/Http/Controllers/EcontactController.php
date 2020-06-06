<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\econtact;
use Illuminate\Support\Facades\Auth;

class EcontactController extends Controller
{
    public function addecontact(Request $request){
        	$user = Auth::user();

        	$reg=new econtact;
            $reg->email=$user->email;
            $reg->contact1=$request->contact1;
            $reg->contact2=$request->contact2;
            $reg->contact3=$request->contact3;
            $reg->save();
            if($reg){
                return response()->json($data=[
                    'status'=>200,
                    'msg'=>'phone number added succefully',
                    'details'=>$reg,
                ]);
            }else{
                return response()->json($data=['status'=>203,
                'msg'=>'something went wrong']);
            }
}

    public function showecontact(Request $request){
          $user = Auth::user();
          $showcontact = econtact::find($user);
          return response()->json($showcontact);
    }
	
}
