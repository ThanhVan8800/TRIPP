<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected function fixImage(User $user)
    {
        // chay lenh php artisan storage:link
        if(Storage::disk('public')->exists($user->image)){
            $user->image = Storage::url($user->image);
        } else{
            $user->image = 'image/no_image_placeholder.png';
            // download 1 hinhf ddee vao thumuc public/img
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $lstUser = User::all();
        foreach($lstUser as $us)
        {
            $this->fixImage($us);
        }
        return view('taikhoan.user_index',[
            'title'=>' Danh sách tài khoản',
            'lstUser' => $lstUser
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        
        return view('taikhoan.user_create',[
            'title'=> 'Thêm tài khoản'
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
        $user = new User;
        $user -> fill([
            'name' => $request->input('name1'),
            'email' => $request->input('email1'),
            'image' => '',
            'password' => $request->input('password1')
        ]);
        $user ->save();
        if($request->hasFile('image')){
            $user->image = $request->file('image') -> store('image/tk'.$user->id,'public');
        }
        $user->save();
        return Redirect::route('user.index',['taikhoan'=>$user]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->fixImage($user);
        return view('taikhoan.user_show',['title'=>'Chi tiết tài khoản','user'=> $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
       // $lstTaiKhoan = User::all();
        $this->fixImage($user);
        return view('taikhoan.user_edit',[
            'title' => "Chỉnh sửa",
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if($request->hasFile('image')){
            $user->image = $request->file('image')->store('image/tk'.$user->id,'public');
        }
        $user->fill([
            'name' => $request->input('name1'),
            'email' => $request->input('email1'),
            'password' => $request->input('password')
        ]);
        $user->save();
        return Redirect::route('user.index',[
            'user' => $user
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user -> delete();
        return redirect::route('user.index');
    }
}
