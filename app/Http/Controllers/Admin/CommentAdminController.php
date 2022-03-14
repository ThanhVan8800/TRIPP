<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;


class CommentAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Comment $cmt)
    {
        $lstCmt = Comment::all();
        return view('cmt.cmt_index',[
            'title' => 'Quản lí danh sách bình luận',
            'lstCmt' => $lstCmt,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Comment $cmt)
    {
        $lstUser = User::all();
        $lstPost = Post::all();
        return view('cmt.cmt_create',[
            'title' => 'Tạo bình luận cho bài viết',
            'cmt' => $cmt,
            'lstUser' => $lstUser,
            'lstPost' => $lstPost
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
        // $request->validate([
        //     'comment' => 'required'
        // ],[
        //     'comment.required' => 'Bình luận không được bỏ trống'
        // ]);
        $cmt = new Comment;
        $cmt -> fill([
            'comment' => $request -> input('noidungbl'),
            'post_id' => $request -> input('postid'),
            'user_id' => $request -> input('userid')       
        ]);
        $cmt -> save();
        return redirect::route('cmt.show',['cmt' => $cmt]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $cmt)
    {
       return view('cmt.cmt_show',[
            'title' => 'Chi tiết bình luận',
            'cmt' => $cmt
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $cmt)
    {
        $lstUser = User::all();
        $lstPost = Post::all();
        return view('cmt.cmt_edit',[
            'title' =>    'Chỉnh sửa bình luận' ,
            'cmt' => $cmt,
            'lstUser' => $lstUser,
            'lstPost' => $lstPost
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $cmt)
    {
        $request->validate([
            'comment' => 'required'
        ],[
            'comment.required' => 'Bình luận không được bỏ trống'
        ]);
        $cmt -> fill([
            'comment' => $request->input('noidungbl')
        ]);
        $cmt->save();
        return redirect:: route('cmt.show',[
            'cmt' => $cmt
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $cmt)
    {
        $cmt->delete();
        return redirect::route('cmt.index');
    }
}
