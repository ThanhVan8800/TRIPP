<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use Illuminate\Support\Facades\Redis;

class AuthController extends Controller
{
    //Register user
    public function register(Request $request)
    {
        //validate fields
        $attrs = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'sdt' => 'required'
        ]);

        //create user
        $user = User::create([
            'name' => $attrs['name'],
            'email' => $attrs['email'],
            'password' => bcrypt($attrs['password']),
            'sdt' => $attrs['sdt']
        ]);

        //return user & token in response
        return response([
            'user' => $user,
            'token' => $user->createToken('secret')->plainTextToken
        ], 200);
    }

    // login user
    public function login(Request $request)
    {
        //validate fields
        $attrs = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // attempt login
        if(!Auth::attempt($attrs))
        {
            return response([
                'message' => 'Invalid credentials.'
            ], 403);
        }
        //return user & token in response
        return response([
            'user' => auth()->user(),
            'token' => auth()->user()->createToken('secret')->plainTextToken
        ], 200);
    }

    // logout user
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response([
            'message' => 'Logout success.'
        ], 200);
    }

    // get user details
    public function user()
    {
        return response([
            'user' => auth()->user()
        ], 200);
    }

    // update user
    public function update(Request $request)
    {
        $attrs = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'sdt' => 'required|string',
        ]);

        $image = $this->saveImage($request->image, 'profiles');

        auth()->user()->update([
            'name' => $attrs['name'],
            'email' => $attrs['email'],
            'sdt' => $attrs['sdt'],
            'image' => $image
        ]);

        return response([
            'message' => 'Cập nhật thông tin của bạn thành công.',
            'user' => auth()->user()
        ], 200);
    }
    //update pass
    public function changePassword(Request $request)
    {
        $attrs = $request->validate([
            'password' => 'required',
            'new_password' => 'required|string|min:6|different:password',
            'confirm_password' => 'required|same:new_password',
            
        ]);
        $user = request()->user();
        if(!Hash::check($request->password, $user->password)){
            return response()->json([
                'status_code' => 422,
                'message' => ' Mật khẩu không tồn tại'
            ]);
        }
        $user->password = Hash::make($request->new_password);
            $user->save();

            return response()->json([
                'status_code'=>200,
                'message' => 'Đổi mật khẩu thành công'
            ]);

    }

}
