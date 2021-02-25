<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;

class UserController extends Controller
{
    public function login( Request $request){ 

        if(Auth::attempt( ['email' => $request->email, 'password' => $request->password]) || Auth::attempt( ['phone' => $request->email, 'password' => $request->password])){ 
         	$user = Auth::user(); 
            $accessToken = auth()->user()->createToken('authToken')->accessToken;

            return response()->json([
                'access_token' => auth()->user()->createToken('authToken')->accessToken,
                'token_type' => 'Bearer',
                'user'=>auth()->user(),
            ]); 
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }

    public function register(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|email', 
            'password' => 'required', 
            'c_password' => 'required|same:password', 
        ]);
		if ($validator->fails()) { 
		            return response()->json(['error'=>$validator->errors()], 401);            
		        }
		$input = $request->all(); 
		        $input['password'] = bcrypt($input['password']); 
		        $user = User::create($input); 
		        $success['token'] =  $user->createToken('MyApp')->accessToken; 
		        $success['name'] =  $user->name;
		return response()->json(['success'=>$success]); 
	}

	public function details() 
    { 
        $user = auth()->user(); 
        return response()->json(['success' => $user]); 
    }
}
