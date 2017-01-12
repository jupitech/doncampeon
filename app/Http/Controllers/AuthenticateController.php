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
use Doncampeon\Models\Equipos;
use Doncampeon\Models\EquipoFavorito;
use Doncampeon\Models\PartidoCalendario;
use Illuminate\Support\Facades\Mail;
use Cache;
use Illuminate\Support\Facades\Redis;
use Carbon\Carbon;

class AuthenticateController extends Controller
{
    
   public function __construct()
   {
       // Apply the jwt.auth middleware to all methods in this controller
       // except for the authenticate method. We don't want to prevent
       // the user from retrieving their token if they don't already have it
       $this->middleware('jwt.auth', ['except' => ['authenticate','register','completar1','completar2']]);
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
        //Llamando Información del usuario por email
         $user=User::where('email',$credentials['email'])->first();
         //Conexión Redis
         $enRedis=Redis::connection();
         $hoy=Carbon::now();
         $elkey='log_login:'.$user->id.':'.$hoy->timestamp;
        
         $enRedis->hset($elkey,'email',$user->email);
         $enRedis->hset($elkey,'username',$user->username);
         $enRedis->hset($elkey,'login',$hoy);
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


        $usuario=User::with("InfoUsuario")->where('id',$user->id)->first();
        // the token is valid and we have found the user via the sub claim
        return response()->json(compact('usuario'));
    }

     public function register(Request $request){
     
     $email=$request['email'];
     $exemail= substr($email, 0,4);
     $randem=str_random(5);
     $miuser=$exemail.$randem;
     
     $user=User::create([
                  'username' => $miuser,
                  'email' => $request['email'],
                  'password' => bcrypt($request['password']),
                  'api_token' => str_random(60),
                        ]);
          $user->save();

         $userprofile=UserProfile::create([
                  'user_id' => $user->id,
                  'pais' => $request['pais'],
                  'telefono' => $request['telefono'],
                  'estado_profile' => 1,
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

         
         //Conexión Redis para Logs
         $enRedis=Redis::connection();
         $hoy=Carbon::now();
         $elkey='log_registro:'.$user->id;
        
         $enRedis->hset($elkey,'email',$user->email);
         $enRedis->hset($elkey,'username',$user->username);
         $enRedis->hset($elkey,'login',$hoy);


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
            ->to('hola@doncampeon.com', 'Nuevo Usuario')
            ->subject('Usuario ['.$user->username.' ] Registrado');
         });

    }


    public function completar1(Request $request,$id){
     
             $firstname=$request['first_name'];

           
            
             $userprofile=UserProfile::where('user_id',$id)->first();

             $userprofile->fill([
                'first_name' => $firstname,
              ]);
              $userprofile->save();

      }

      public function equipos(){

            $equipos=Equipos::with("NombrePais","LigasEquipo")->get();
           if(!$equipos){
                return response()->json(['mensaje' =>  'No se encuentran equipos actualmente','codigo'=>404],404);
             }
         return response()->json(['datos' =>  $equipos],200);
      }


     public function completar2(Request $request,$id){
     
             $iduser=$id;
             $idequipo=$request['id_equipo'];

            
            
             $equipofav=EquipoFavorito::where('id_equipo',$idequipo)->where('id_user',$iduser)->first();

             if($equipofav==''){


                   $equipo=EquipoFavorito::create([
                          'id_user' => $iduser,
                          'id_equipo' => $idequipo,
                          'tipo_equipo' => 1,
                          'estado_equipo'=> 1,
                                ]);
                  $equipo->save();


                     $userprofile=UserProfile::where('user_id',$iduser)->first();

                     $userprofile->fill([
                        'estado_profile' => 2,
                      ]);
                      $userprofile->save();

             }else{
                   return response()->json(['mensaje' =>  'Ya existe equipo favorito asignado a este usuario','codigo'=>404],404);
             }

      }

}
