<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\DiaDanh;
use App\Models\VungMien;
use App\Models\Like;
use Carbon\Carbon;


class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lstUser = User::count();
        $lstPost = Post::count();
        $lstDiaDanh = DiaDanh::count();
        $lstVungMien = VungMien::count();

        return view('home',[
            'title'=>"Trang quản trị",
            'lstUser'=>$lstUser,
            'lstPost'=>$lstPost,
            'lstDiaDanh'=>$lstDiaDanh,
            'lstVungMien'=>$lstVungMien,
        ]);
    }
    public function ThongKeChart()
    {
        $output = "";

        $countLike = Like::whereMonth('created_at', Carbon::now()->month)->where('user_id', '=', 1)->count();
        

        $count12Thang = [];
        b:
        for ($i = 1; $i <= 12; $i++) {
            $Like = Like::whereMonth('created_at', $i)->where('user_id', '=', 1)->count();
            $count12Thang[$i - 1] = $Like ;

            $output .= "<input type='hidden' id='thang' value='" . $count12Thang[$i - 1] . "' />";
        }
        $output .= "<input type='hidden' id='like' value='" . $countLike . "' />" ;
        

        return response()->json($output);
    }
}
