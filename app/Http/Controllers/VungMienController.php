<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VungMien;
use Illuminate\Support\Facades\Storage;

class VungMienController extends Controller {
        public function index()
        {
            $lstVungMien = VungMien::all();
        
        // with(['HinhAnh' => function($query)
        // {
        //     $query -> where('loai_hinh_anh', '=' , 1) -> select('id', 'dia_danh_id', 'post_id', 'loai_hinh_anh', 'hinh_anh') -> orderBy('created_at','desc');
        // }])->get();
        
        return response()->json([
            'data' => $lstVungMien
        ],200);
        }
        public function show($id)
        {
            $vungmien = VungMien::all();

            return response()->json([
                    'data' => $vungmien
            ],200);
        }
}   