<?php

namespace Doncampeon\Http\Controllers;

use Illuminate\Http\Request;
use Doncampeon\Http\Requests;
use Session;
use Redirect;
use Doncampeon\Http\Controllers\Controller;
use Doncampeon\User;
use Doncampeon\Models\RoleUser;
use Doncampeon\Models\UserProfile;
use Doncampeon\Models\UserGame;
use Doncampeon\Models\Juego;
use Doncampeon\Http\Requests\UsuariosCreateRequest;
use Doncampeon\Http\Requests\UsuariosUpdateRequest;
use Illuminate\Support\Facades\Mail;
use Validator;

class UserCampeonesController extends Controller
{
    public function __contruct(){
        $this->middleware('role:admin|editor');
    }
  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
    {
         $user=User::create([
                  'username' => $request['username'],
                  'email' => $request['email'],
                  'password' => bcrypt($request['password'])
                        ]);
          $user->save();

         $userprofile=UserProfile::create([
                  'user_id' => $user->id,
                  'first_name' => $request['first_name'],
                  'last_name' => $request['last_name'],
                  'direccion' => $request['direccion'],
                  'pais' => $request['pais'],
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
                  'equipo_nacional' => $request['equipo_nacional'],
                  'equipo_internacional' => $request['equipo_internacional'],
                  'puntos_iniciales' => $puntoinicial->puntos_iniciales,
                  'puntos_acumulados' => $puntoinicial->puntos_iniciales,
                  'nivel_id'=> $puntoinicial->id,
                        ]);
         $usergame->save();



        Session::flash('message','Campeón "'. $user->username .'" creado correctamente.');
        

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

        return Redirect::to('/campeones');
      

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $user=User::find($id);
          $userprofile=UserProfile::where('user_id',$user->id)->first();
          $roleuser=RoleUser::where('user_id',$user->id)->first();
           $usergame=UserGame::where('user_id',$user->id)->first();
        return view('admin.campeones.editarcampeon',['user'=>$user,'userprofile'=>$userprofile,'roleuser'=>$roleuser,'usergame'=>$usergame]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         if($request['password']!=''){
        $user=User::find($id);
        $user->fill([
                'password' => bcrypt($request['password'])
            ]);
        $user->save();
        }


         $userprofile=UserProfile::where('user_id',$id)->first();
          $userprofile->fill([
                  'first_name' => $request['first_name'],
                  'last_name' => $request['last_name'],
                  'edad' => $request['edad'],
                  'pais' => $request['pais'],
                  'direccion' => $request['direccion'],
                        ]);
         $userprofile->save();

         $usergame=UserGame::where('user_id',$id)->first();
         $usergame->fill([
                  'equipo_nacional' => $request['equipo_nacional'],
                  'equipo_internacional' => $request['equipo_internacional'],
                        ]);
         $usergame->save();


        Session::flash('message','Campeón editado correctamente.');
        return Redirect::to('/campeones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         if($id!='1'){
          $user=User::find($id);
          
          $user->delete();
         

         Session::flash('message','Usuario inactivo correctamente.');
        return Redirect::to('/opciones');
        }else{
            Session::flash('message','Usuario no puede eliminarse es Admin Principal.');
        return Redirect::to('/campeones');
        }
    }

     public function restaurar($id)
    {
       
       User::withTrashed()->where('id',$id)->restore();

         Session::flash('message','Usuario restaurado correctamente.');
        return Redirect::to('/campeones');

      } 

}
