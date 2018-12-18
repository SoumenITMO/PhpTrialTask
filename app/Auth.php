<?php
namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Auth extends Model
{
    // Auth Table
	protected $table = 'auths';
	
	// Fetch single Auth Token by client ID
	public function getToken($client_id)
	{
		return DB::table('auths')->select('token')->where(['client_id'=>$client_id])->get();
	}
	
	// Set Auth Token
	public function setToken($token)
	{
		if(DB::table('auths')->select('token')->where(['token'=>$token])->count() != 0)
		return $token;
		else return false;
	}
}
