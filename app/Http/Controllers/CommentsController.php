<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request;
use App\comments;
use Illuminate\Support\Facades\Redirect;
use App\Http\Request\ProfileController;
use DB;

class CommentsController extends Controller
{
   public function __construct(){

	}
 
	public function index(Request $request){
		if($request){
			$query = trim($request->get('searchText'));
			$commentss=DB::table('comments')->where8('comments','LIKE','%'.$query'%')
			->paginate(10);
			return view('comments.index',["comments"=>$commentss,"searchText"=>$query]);

		}
	}


	public function create(){
		return view("comments.create");
	}



	public function store(){
		$commentss= new comments;
		$comments->comments=$request->$get('comments');
		$commentss->save();
		return Redirect::to('comments');
	}

	public function show(){}

	public function edit(){}

	public function update(){}

	public function destroy(){}
}
