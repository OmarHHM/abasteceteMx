<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Request as Requests;
use App\Http\Controllers\Controller;
use App\Profile;
use App\Address;
use App\Sub_Category;
use App\Category;
use App\User;
use App\State;
use App\Country;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

use DB;

class ProfileController extends Controller
{
	public function __construct(){
        $this->middleware('auth');
	}
 
	public function index(){
		$idUser= Auth::user()->id;
		$profile = Profile::where('id_user', $idUser)->first();
		$address = Address::where('id_user',$profile->id)->first();

		if(is_null($address)){
			$address= new Address();			
		}	

		$states  = State::all(); 
		$countries =Country::all();

		$states_combo= $states->pluck('description', 'id');
		$countries_combo= $countries->pluck('description', 'id');
		$urL= Requests::url();

		 return view('profile.profile', [
            'isPrincipal'=>false,
            'idUser'=>$idUser,
            'profile'=>$profile,
            'address'=>$address,
            'countries'=>$countries_combo,
            'states'=>$states_combo,
            'url'=>$urL,
        ]);

	}

	public function show(){
/*			if($request){
				$query = trim($request->get('searchText'));
			}*/

	}


    public function store(Request $request)
    {

        $profile           = new Profile;
        $profile->name     = $request->input('name');
        $profile->phoneM   = '8888';//$request->input('phoneM')'';
        $profile->email    = $request->input('email');
        $profile->isBusiness    =false;
        $profile->rfc    ='heh';
        $profile->id_user    =1;

        $profile->save();

//        $dataProfile=request()->all;
  //     $dataProfile=request()->except(_token);

       // Profiles::insert($dataProfile);
		return view('profile.profile');

    }


	public function edit(){

	}

	public function update(Request $request){
		$idUser= Auth::user()->id;
		$profile = Profile::where('id_user', $idUser)->first();


     	$file = $request->file('photo');
    	// Get the contents of the file
	    $contents = $file->openFile()->fread($file->getSize());




		if ($profile->isBusiness==1)
			Profile::where('id', $profile->id)
	                ->update(['name' => $request->input('name'),
	                         'lastName1'=>$request->input('lastName1'),
	                         'lastName2'=>$request->input('lastName2'),
	                         'phoneM'=>$request->input('phoneM'),
	                         'photo'=>$contents                         
	                         ]
	                        );

        else if($profile->isBusiness==0)
	     	Profile::where('id', $profile->id)
	                ->update(['name' => $request->input('name'),
	                         'lastName1'=>$request->input('lastName1'),
	                         'lastName2'=>$request->input('lastName2'),
	                         'phoneM'=>$request->input('phoneM'),
		                     'photo'=>$contents                         
                         
	                         ]
	                        );

        Address::where('id_user', $profile->id)
                ->update(['adrress' => $request->input('adrress'),
                         'neigborhood'=>$request->input('neigborhood'),
                         'postal_code'=>$request->input('postal_code'),    
                         'id_country'=>$request->input('country'),    
                         'id_state'=>$request->input('state'),     
                         ]
                        );
		return Redirect::back()->with('msg', 'Perfil Modificado Exitosamente.');
	}

	public function destroy(){}
	public function details(Request $request){
		
		$idProfile=$request->id;
		$profile = Profile::find($request->id);
		$addressP = Address::
					   leftJoin('countries', 'addresses.id_country', '=', 'countries.id')
					   ->leftJoin('states', 'addresses.id_state', '=', 'states.id')
					   ->select('addresses.adrress','addresses.neigborhood','addresses.postal_code','states.description as descState','countries.description as descCountry')
					   ->where('addresses.id_user','=',$idProfile)
					    ->get();

	    $category= Category::find($profile->category_id);
	    $subCategory= Sub_Category::find($profile->subcategory_id);
   		$urL= Requests::url();
   		$urL= str_replace("details","profile",$urL);

		return view('profile.details', [
        	'supplier'=>$profile,
        	'addressP'=>$addressP,
        	'department'=>$category,
        	'category'=>$subCategory,
        	'url'=>$urL,
        ]);
	}

	public function image($id){
			$profile = Profile::where('id', $id)->first();
			return response()->make($profile->photo, 200, array('Content-Type' => (new finfo(FILEINFO_MIME))->buffer($profile->photo)
    		));
	}
 }
