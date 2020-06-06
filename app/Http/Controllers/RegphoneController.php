<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\regphone;
use Illuminate\Support\Facades\Auth;

class RegphoneController extends Controller
{
    public function addphone(Request $request){
        	$user = Auth::user();

        	$reg=new regphone;
            $reg->email=$user->email;
            $reg->registerphone=$request->registerphone;
            $reg->save();
            if($reg){
                return response()->json($data=[
                    'status'=>200,
                    'msg'=>'phone number added succefully',
                ]);
            }else{
                return response()->json($data=['status'=>203,
                'msg'=>'something went wrong']);
            }
    }
}
