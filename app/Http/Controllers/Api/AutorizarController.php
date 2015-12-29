<?php

namespace Doncampeon\Http\Controllers\Api;

use Illuminate\Http\Request;
use Doncampeon\User;
use Doncampeon\Http\Requests;
use Doncampeon\Http\RegisterRequest;
use Doncampeon\Http\LoginRequest;
use Doncampeon\Http\Controllers\Controller;
use JWTAuth;
use JWTAuthException;

class AutorizarController extends Controller
{
    private $user;
    private $jwtauth;
  public function __construct(User $user,JWTAuth $jwtauth)
  {
    $this->user = $user;
      $this->jwtauth = $jwtauth;
      $this->middleware('jwt.auth');
  }

    public function index()
    {
        // Retrieve all the users in the database and return them
        $users = User::all();
        return $users;
    }

public function register(RegisterRequest $request)
  {
    $newUser = $this->user->create([
      'username' => $request->get('username'),
      'email' => $request->get('email'),
      'password' => bcrypt($request->get('password'))
    ]);
    if (!$newUser) {
      return response()->json(['failed_to_create_new_user'], 500);
    }
    
    return response()->json(['user_created']);
     return response()->json([
    'token' => $this->jwtauth->fromUser($newUser)
 		 ]);
  }
  public function login(LoginRequest $request)
  {
   // get user credentials: email, password
	  $credentials = $request->only('email', 'password');
	  $token = null;
	  try {
	    $token = $this->jwtauth->attempt($credentials);
	    if (!$token) {
	      return response()->json(['invalid_email_or_password'], 422);
	    }
	  } catch (JWTAuthException $e) {
	    return response()->json(['failed_to_create_token'], 500);
	  }
	  return response()->json(compact('token'));
	  }

}
