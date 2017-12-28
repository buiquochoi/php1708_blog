<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Upfile extends Controller
{
    //
    public function savefile(Request $request){
    	$request->validate(
    		[
    			'username'=> 'required',
    			'image' => 'required|image'
    		],
    		[
    			'username.required' => 'không được để trống',
    			'image.required' => 'không được để trống',
    			'image.image' => 'file không đúng định dạng'
    		]
    	);
    	return "hello";
    }
}
