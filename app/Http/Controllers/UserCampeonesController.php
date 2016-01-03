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
                'role_id' =>4,
                'user_id' =>$user->id,
            ]);
          $roleuser->save();



        Session::flash('message','Campeón "'. $user->username .'" creado correctamente.');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
