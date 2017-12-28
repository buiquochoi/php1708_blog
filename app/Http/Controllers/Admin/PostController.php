<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use App\Http\Requests\SavePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts= Post::paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tags = Tag::all();
        $categories = Category::All();
        return view('admin.posts.create', compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SavePostRequest $request)
    {
        //
        // dd($request);
        $post = new Post();
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->content = $request->content;
        $post->category_id = $request->category_id;

        if ($request->hasFile('featured')){
            $file = $request->file('featured');
            $filename = time().$file->getClientOriginalName();
            $file->storeAs('upload/posts', $filename);
            $post->featured = "upload/posts/".$filename;
        }
        // dd($request);
        $post->save();
        $post->tags()->sync($request->tags, false);
        session()->flash('notif','Thêm thành công');
        return redirect()->route('posts.index');
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
        $tags = Tag::all();
        $categories = Category::all();
        $post= Post::find($id);
        // dd($post);
        return view('admin.posts.edit', compact(['post','categories','tags']));
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
        $post = Post::find($id);
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->content = $request->content;
        $post->category_id = $request->category_id;

        if ($request->hasFile('featured')){
            $file = $request->file('featured');
            $filename = time().$file->getClientOriginalName();
            $file->storeAs('upload/posts', $filename);
            $post->featured = "upload/posts/".$filename;
        }
        // dd($request);
        $post->save();
        $post->tags()->sync($request->tags);
        session()->flash('notif','Sửa thành công');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if (!$post){
            echo "Bài viết không tồn tại!";
        }
        $post->delete();
        if (file_exists($post->featured)){
            unlink(public_path($post->featured));
        }
        session()->flash('notif','Xóa thành công bài viết');
        return redirect()->back();
    }

    public function getCateName($id){
        $cate = Post::find($id)->category();
        return $cate;
    }
}
