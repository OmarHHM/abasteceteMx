<?php

use Illuminate\Support\Facades\Route;
use App\Profile;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::resource('/', 'WelcomeController');


Route::get('/', 'WelcomeController@index')->name('welcome');

Route::get('/search', 'WelcomeController@search')->name('search');

//Route::resource('user/profile', CommentsController);

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'WelcomeController@index')->name('home');


Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
	Route::resource('/users','UserController',['except'=> ['show','create','store']]);
});


Route::get('/details',
	['as' => 'getDetail', 'uses' => 'ProfileController@details']);

//Route::get('/details/{id}', 'ProfileController@details')->name('details');

Route::get('/profile','ProfileController@index')->name('profile');
Route::post('/updateProfile','ProfileController@update')->name('updateProfile');
Route::get('/profile/{id}/image', function ($id) {
    // Find the user
	$profile = Profile::where('id', $id)->first();

    // Return the image in the response with the correct MIME type
	return response()->make($profile->photo, 200, array('Content-Type' => (new finfo(FILEINFO_MIME))->buffer($profile->photo)
    		));

});

Route::get('/comments',
	['as' => 'getComment', 'uses' => 'CommentaryController@index']);
