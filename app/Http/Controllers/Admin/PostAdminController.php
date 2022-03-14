<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Post;
use App\Models\DiaDanh;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class PostAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function fixImage(Post $post)
    {
        if(Storage::disk('public')->exists($post->image)){
            $post->posts = Storage::url($post->image);
        } else{
            $post->posts ='image/no_image_placeholder.png';
        }
    }
    public function index()
    {
        $lstPost = Post::all();
        
        foreach($lstPost as $po){
            $this->fixImage($po);
        }
        return view('baiviet.post_index',[
            'title' => 'Danh sách bài viết',
            'lstPo' => $lstPost,
            // 'lstDiaDanhid' => $lstDiaDanhid
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        $lstUser = User::all();
        $lstDiaD = DiaDanh::all();
        return view('baiviet.post_create',[
            'title' => 'Tạo bài viết',
            'post' => $post,
            'lstUser' => $lstUser,
            'lstDiaD' => $lstDiaD
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post -> fill([
            'body' => $request->input('body1'),
            'image' => '',
            'user_id' => $request->input('userid'),
            'diadanhid' => $request->input('dia_danh_id')
        ]);
        $post->save();
        if($request->hasFile('image')){
            $post->image = $request->file('image') -> store('posts/post'.$post->id,'public');
        }
        $post->save();
        return Redirect::route('post.index',['post'=>$post]);
        // return view('baiviet.post_index',['post_index'=>$post]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
    
        $this->fixImage($post);
        return view('baiviet.post_show',['title'=> 'Cập nhật bài viết','post'=> $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->fixImage($post);
        $lstUser = User::all();
        return view('baiviet.post_edit',[
            'title' => 'Chỉnh sửa bài viết',
            'post' => $post,
            'lstUser' => $lstUser
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if($request->hasFile('image')){
            $post->image = $request->file('image')->store('posts/post/'.$post->id,'public');
        }
        $post -> fill([
            'body'=>$request->input('body1')
            
        ]);
        $post->save();
        return Redirect::route('post.show',['post'=>$post]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect::route('post.index');
    }
}
