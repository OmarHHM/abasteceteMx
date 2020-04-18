<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Country, State,Profile,User};
use Illuminate\Support\Facades\DB;
use Request as Requests;

class WelcomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

		$profiles = Profile::
        	           leftJoin('addresses', 'profiles.id', '=', 'addresses.id_user')
					   ->leftJoin('countries', 'addresses.id_country', '=', 'countries.id')
					   ->leftJoin('states', 'addresses.id_state', '=', 'states.id')
					   ->select('profiles.id','profiles.name','addresses.adrress','addresses.neigborhood','addresses.postal_code','states.description as descState','countries.description as descCountry')
					   ->where('profiles.isBusiness','=','0')
					   ->limit(6)
					    ->get();

        $urL= Requests::url();
        $urL= str_replace("home","profile",$urL);
        $posicion_coincidencia = strpos($urL, 'profile');
 
        if ($posicion_coincidencia === false) {
            $urL= $urL."/profile";
        }

        return view('welcome', [
            'countries' => Country::all(),
            'states' => State::all(),
            'suppliers'=>$profiles,
            'isPrincipal'=>true,
            'title'=> 'Lo más buscado',
            'url'=>$urL,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
   

     public function search(Request $request)
    {
        
        $profiles = Profile::
                       leftJoin('addresses', 'profiles.id', '=', 'addresses.id_user')
                       ->leftJoin('countries', 'addresses.id_country', '=', 'countries.id')
                       ->leftJoin('states', 'addresses.id_state', '=', 'states.id')
                       ->select('profiles.name','addresses.adrress','addresses.neigborhood','addresses.postal_code','states.description as descState','countries.description as descCountry')
                       ->where('profiles.isBusiness','=','0')
                       ->where('profiles.name','like','%'.$request->input('search').'%')
                       ->limit(6)
                        ->get();

        return  view('welcome', [
            'countries' => Country::all(),
            'states' => State::all(),
            'suppliers'=>$profiles,
            'isPrincipal'=>false,
            'title'=> 'Proveedores Encontrados',
           ]);
    }
}
