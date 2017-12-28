<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
    	// $users = DB::table('users')->count();
    	// $posts = DB::table('posts')->count();

    	return view('admin.dashboard');
    }
    public function showUsers(){
    	$users = DB::table('users')->pluck('firstName','email');
    	dd($users);
    }
    public function insert($title , $content){
    	$post =[
    			'title' => 'Lorem ipsum dolor sit amet.',
    			'content' =>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim, sapiente.',
    			'short_desc' =>'Lorem ipsum dolor sit amet.',
    			'author' => '2'


    		];
    	DB::table('posts')->insert($title,$content);
    }
}
