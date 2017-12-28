<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\Category;
use App\Http\Requests\SaveCategoryRequest;

class CategoryController extends Controller
{
    public function index(){
    	$categories = Category::all();

    	return view('admin.categories.index',compact('categories'));
    }
    public function create(){
    	return view('admin.categories.create');
    }
    
    public function store(SaveCategoryRequest $request){
        // $this->validate($request, [
        //  'name' => 'required|min:6|max:255]',
        //  'slug' => 'required'
        // ]);
        // dd($request->all());
        $newcate = new Category();
        $newcate->name = $request->name;
        $newcate->slug = str_slug($request->name).'.html';
        $newcate->save();
        // $categories = Category::All();
        return redirect()->route('categories.index');
    }

    public function edit($id){
        // echo $id;
        // dd($id);

        $cate = Category::where('id', $id)->get()->first();
        // dd($cate->name);
        return view('admin.categories.edit', compact('cate'));
    }

    public function editSave(SaveCategoryRequest $request){
        $cate = Category::find($request->id);
        
        if ($cate->slug != $request->slug){
            $cate->slug = $request->slug;
        }
        else{
            $cate->slug = str_slug($request->name).'.html';
        }
        
        $cate->name = $request->name;
        $cate->update();
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }
    public function destroy($id){
        $model = Category::find($id);
        if (Auth::user()->role < 50){
            return view('admin.403');
        }
        if (!$model) {
            echo "<h1>Danh mục không tồn tại</h1>";die;
        }
        $model->delete();
        session()->flash('notif','Xóa thành công danh mục');
        return redirect()->route('categories.index');
    }

    public function getPost($id){
        $posts = Category::find($id)->posts();
        return $posts;
    }
}
