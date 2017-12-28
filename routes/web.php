<?php

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
Route::get('/posts',function(){
	$posts = [
		[
			'id' => 1,
			'img' => 'http://lorempixel.com/400/250',
			'title' => 'Lorem ipsum dolor sit amet.',
			'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque iure aliquid perferendis assumenda necessitatibus dolorem aperiam inventore, est, quasi ex?',
			'author' => 'Bac ho'
		],
		[
			'id' => 2,
			'img' => 'http://lorempixel.com/400/250',
			'title' => 'Lorem ipsum dolor sit amet.',
			'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque iure aliquid perferendis assumenda necessitatibus dolorem aperiam inventore, est, quasi ex?',
			'author' => 'Bac ho'
		],
		[
			'id' => 3,
			'img' => 'http://lorempixel.com/400/250',
			'title' => 'Lorem ipsum dolor sit amet.',
			'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque iure aliquid perferendis assumenda necessitatibus dolorem aperiam inventore, est, quasi ex?',
			'author' => 'Bac ho'
		],
		[
			'id' => 4,
			'img' => 'http://lorempixel.com/400/250',
			'title' => 'Lorem ipsum dolor sit amet.',
			'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque iure aliquid perferendis assumenda necessitatibus dolorem aperiam inventore, est, quasi ex?',
			'author' => 'Bac ho'
		],
		[
			'id' => 5,
			'img' => 'http://lorempixel.com/400/250',
			'title' => 'Lorem ipsum dolor sit amet.',
			'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque iure aliquid perferendis assumenda necessitatibus dolorem aperiam inventore, est, quasi ex?',
			'author' => 'Bac ho'
		],

	];
	return view('homePage',compact('posts'));
	// return view('homePage');


	
});
Route::get('/',function(){
		$name = ['Đinh Văn Đông','cong phuong'];
		$age=10;
		$add= "<a href='google.com'>Ha Noi,Viet Nam</a>";
		return view('welcome',compact('name','age','add'));
	});

Route::get('test-route',function(){

	return 'get method';
});
Route::post('test-route',function(){

	return 'Post method';
});
Route::get('dashboard',function(){
	return view('admin.dashboard');
});
Route::get('home-page',function(){
	return view('home');
})->name('home.index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



// Route::get('generate/{pass}',function($pass){
// 	$pass=Hash::make($pass);
// 	return $pass;
// });