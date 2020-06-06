<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\youtubelink;
use App\article;
use Illuminate\Support\Facades\Auth;
use App\econtact;


class YoutubelinkController extends Controller
{
	public function show(){
		$youtubedata = youtubelink::paginate(1);
		return response()->json($youtubedata);
	}

	public function showarticle(){
		$article = article::paginate(1);
		return response()->json($article);
	}
	public function fullarticle($id){
		$fullarticle = article::find($id);
		return response()->json($fullarticle);
	}

	public function smsalert(){

		$usermail = Auth::user()->email;
		$finduser = econtact::where('email',$usermail)->first();
		//return response()->json($finduser);
		//die();
		$name = Auth::user()->name;

		//Your authentication key
		$authKey = "YourAuthKey";

		//Multiple mobiles numbers separated by comma
		$mobileNumber = $finduser->contact1.",".$finduser->contact2.",".$finduser->contact3;
		

//Sender ID,While using route4 sender id should be 6 characters long.
$senderId = "102234";

//Your message to send, Add URL encoding here.
$message = urlencode($name."Requested User is in Danger. Contact as soon as possible");


//Define route 
$route = "default";
//Prepare you post parameters
$postData = array(
    'authkey' => $authKey,
    'mobiles' => $mobileNumber,
    'message' => $message,
    'sender' => $senderId,
    'route' => $route
);

//API URL
$url="http://api.msg91.com/api/sendhttp.php";

// init the resource
$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData
    //,CURLOPT_FOLLOWLOCATION => true
));


//Ignore SSL certificate verification
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


//get response
$output = curl_exec($ch);

//Print error if any
if(curl_errno($ch))
{
    echo 'error:' . curl_error($ch);
}

curl_close($ch);

echo $output;

}
}

