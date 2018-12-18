<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auth;
use Session;

class AuthController extends Controller
{
    //Fetch Token by User id
	public function getAuthToken(Request $request)
	{
		Session::forget('token');
		$authmodel = new Auth;
		$client_id = $request->input('client_id');
		$arr_ = array();
		if(isset($authmodel->getToken($client_id)[0]))
		{
			echo json_encode($authmodel->getToken($client_id));
			//return response()->json($authmodel->getToken($client_id));
		}
		else echo json_encode(array('Message'=>'invalid Client ID'));
		//else return response()->json(array('Message'=>'invalid Client ID')); 	
	}
	
	// Set Access Token in Sesssion 
	public function setAuth(Request $request)
	{
		$access_token = $request->input('token');
		$authmodel = new Auth;
		if(response()->json($authmodel->setToken($access_token)) != false)
			Session::put('token', $authmodel->setToken($access_token));
		else echo json_encode(array('Message'=>'Access Token Error'));
	}
	
	// Show Error
	public function error()
	{
		echo json_encode(array('Message'=>'Access Token Error'));
	}
}
