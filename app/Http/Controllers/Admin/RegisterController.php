<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Jetstream;
use Illuminate\Http\Request;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    
    public function create(Request $input)
    {
         User::create([
            'name' => $input['name'],
            'email'=> $input['email'],
            'password'=> Hash::make($input['password']),
        ]);
        return redirect('/login');
    }
    public function show(){
        return view('register',[
            'title'=> 'Đăng ký'
        ]);
    }
}
