<?php
	
	use App\User;
	use App\Http\Resources\User as UserResource;
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

Route::get('/test',function(){
		return 'admin home page';
	});


Route::get('posts','HomeController@index');
// Route::get('dashboard','HomeController@dashboard');

// Route::get('/', function () {
//     return view('welcome');
// })


Route::group(['namespace'=>'admin'], function(){
	Route::get('/','DashboardController@index')->name('dashboard');

	Route::get('/insert/{title}/{content}','DashboardController@insert');

	Route::get('users','DashboardController@showUsers');
	Route::get('categories','CategoryController@index')->name('categories.index');
	Route::get('categories/create','CategoryController@create')->name('categories.create')->middleware('isAdmin');
	Route::post('categories','CategoryController@store')->name('categories.store')->middleware('isAdmin');

	Route::get('categories/edit{id?}', 'CategoryController@edit')->name('editCategories')->middleware('isAdmin');
	Route::post('categories/editSave', 'CategoryController@editSave')->name('editSave')->middleware('isAdmin');
	Route::get('categories/delete/{id}', 'CategoryController@destroy')->name('desTroy')->middleware('isAdmin');
	Route::get('users', 'UserController@index')->name('users.index');
	Route::get('users/create', 'UserController@create')->name('users.create')->middleware('isAdmin');
	Route::post('users/saveCreate', 'UserController@store')->name('users.store')->middleware('isAdmin');
	Route::get('users/edit/{id}', 'UserController@edit')->name('users.edit')->middleware('isAdmin');
	Route::post('users/editSave/{id}', 'UserController@update')->name('users.editSave')->middleware('isAdmin');
	Route::get('users/delete/{id}', 'UserController@destroy')->name('users.destroy')->middleware('isAdmin');
	Route::get('users/json', function(){
		return new UserResource(User::All());
	});
	Route::get('profile', function(){
		return view('admin.users.profile');
	})->name('users.profile');


	// posts
	Route::get('posts', 'PostController@index')->name('posts.index');
	Route::get('posts/create', 'PostController@create')->name('posts.create');
	Route::post('posts/store', 'PostController@store')->name('posts.store');
	Route::get('posts/edit{id}', 'PostController@edit')->name('posts.edit');
	Route::get('posts/delete/{id}', 'PostController@destroy')->name('posts.destroy');
	Route::post('posts/delete/{id}', 'PostController@update')->name('posts.update');

	Route::get('tags', 'TagController@index')->name('tags.index');
	Route::post('tags/store', 'TagController@store')->name('tags.store');
	Route::get('tags/edit/{id}', 'TagController@edit')->name('tags.edit');
	Route::post('tags/update/{id}', 'TagController@update')->name('tags.update');
});

// https://php.earth

Route::get('session', function(){
	Session::put('users.id', 1);
});
Route::get('session/use', function(){
	$b = Session::all();
	dd($b);
});

Route::get('uploadfile', function(){
	return view('admin.uploadfile.index');
});

Route::post('saveFile', 'Admin\Upfile@savefile')->name('file.save');

Route::get('get-cate/{$id}', 'Admin\PostController@getCateName');
