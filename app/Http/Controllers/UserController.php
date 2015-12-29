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

use Doncampeon\Http\Requests\UsuariosCreateRequest;
use Doncampeon\Http\Requests\UsuariosUpdateRequest;


class UserController extends Controller
{

     public function __contruct(){
        $this->middleware('role:admin|editor');
    }
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(UsuariosCreateRequest $request)
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
                        ]);
         $userprofile->save();

           $roleuser=RoleUser::create([
                'role_id' =>$request['role_id'],
                'user_id' =>$user->id,
            ]);
          $roleuser->save();



        Session::flash('message','Usuario "'. $user->username .'" creado correctamente.');
        return Redirect::to('/opciones');
      

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
         $user=User::find($id);
          $userprofile=UserProfile::where('user_id',$user->id)->first();
          $roleuser=RoleUser::where('user_id',$user->id)->first();
        return view('admin.editarusuario',['user'=>$user,'userprofile'=>$userprofile,'roleuser'=>$roleuser]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(UsuariosUpdateRequest $request, $id)
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
                   'facebook' => $request['facebook'],
                   'twitter' => $request['twitter'],
                        ]);
         $userprofile->save();

           $roleuser=RoleUser::where('user_id',$id)->first();
        $roleuser->fill([
                 'role_id' => $request['role_id'],
            ]);
          $roleuser->save();

        Session::flash('message','Usuario editado correctamente.');
        return Redirect::to('/opciones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if($id!='1'){
          $user=User::find($id);
          
          $user->delete();
         

         Session::flash('message','Usuario eliminado correctamente.');
        return Redirect::to('/opciones');
        }else{
            Session::flash('message','Usuario no puede eliminarse es Admin Principal.');
        return Redirect::to('/opciones');
        }
    }


    public function restaurar($id)
    {
       
       User::withTrashed()->where('id',$id)->restore();

         Session::flash('message','Usuario restaurado correctamente.');
        return Redirect::to('/opciones');

      } 

}
