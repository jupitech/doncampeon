<?php

namespace Doncampeon\Http\Controllers;

use Illuminate\Http\Request;

use Doncampeon\Http\Requests;
use Doncampeon\Http\Controllers\Controller;
use JWTAuth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Doncampeon\User;
use Doncampeon\Models\RoleUser;
use Doncampeon\Models\UserProfile;
use Doncampeon\Models\UserGame;
use Doncampeon\Models\Juego;
use Doncampeon\Models\PartidoCalendario;
use Illuminate\Support\Facades\Mail;

class AuthenticateController extends Controller
{
    
   public function __construct()
   {
       // Apply the jwt.auth middleware to all methods in this controller
       // except for the authenticate method. We don't want to prevent
       // the user from retrieving their token if they don't already have it
       $this->middleware('jwt.auth', ['except' => ['authenticate','register']]);
   }

    public function index()
    {
       // Retrieve all the users in the database and return them
    $partidocalendario = PartidoCalendario::all();
    return $partidocalendario;
    }

  
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            // verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // if no errors are encountered we can return a JWT
        return response()->json(compact('token'));
    }
    
    public function getAuthenticatedUser()
    {
        try {
 
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
 
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
 
            return response()->json(['token_expired'], $e->getStatusCode());
 
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
 
            return response()->json(['token_invalid'], $e->getStatusCode());
 
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
 
            return response()->json(['token_absent'], $e->getStatusCode());
 
        }
 
        // the token is valid and we have found the user via the sub claim
        return response()->json(compact('user'));
    }

     public function register(Request $request){

     $user=User::create([
                  'username' => $request['username'],
                  'email' => $request['email'],
                  'password' => bcrypt($request['password'])
                        ]);
          $user->save();

         $userprofile=UserProfile::create([
                  'user_id' => $user->id,
                   'pais' => 1,
                        ]);
         $userprofile->save();

           $roleuser=RoleUser::create([
                'role_id' =>4,
                'user_id' =>$user->id,
            ]);
          $roleuser->save();

          $puntoinicial=Juego::find(1);

           $usergame=UserGame::create([
                  'user_id' => $user->id,
                  'puntos_iniciales' => $puntoinicial->puntos_iniciales,
                  'puntos_acumulados' => $puntoinicial->puntos_iniciales,
                  'nivel_id'=> $puntoinicial->id,
                        ]);
         $usergame->save();



        Mail::send('emails.bienvenida', ['user'=>$user], function($message) use ($user)
         {
        $message
            ->from('hola@doncampeon.com','Don Campeon Sports')
            ->to($user->email, $user->username)
            ->subject('Bienvenido a Don Campeón');
         });

         Mail::send('emails.nuevousuario', ['user'=>$user], function($message) use ($user)
         {
        $message
            ->from('hola@doncampeon.com','Nuevo Usuario Don Campeón')
            ->to('carlos.ruano@crweb.net', 'Nuevo Usuario')
            ->subject('Usuario ['.$user->username.' ] Registrado');
         });

    }

}
