<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DiaDanh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DiaDanhApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // protected function fixImage(DiaDanh $diaDanh)
    // {
    //     if(Storage::disk('public')->exists($hinhAnh->hinh_anh))
    //     {
    //         $diaDanh->hinhanh = $diaDanh->hinhanh;
    //     }else
    //     {
    //         $diaDanh->hinhanh = 'image/no_image_placeholder.png';
    //     }
    // }
    public function index()
    {
        $lstDiaDanh = DiaDanh::all();
        
        // with(['HinhAnh' => function($query)
        // {
        //     $query -> where('loai_hinh_anh', '=' , 1) -> select('id', 'dia_danh_id', 'post_id', 'loai_hinh_anh', 'hinh_anh') -> orderBy('created_at','desc');
        // }])->get();
        
        return response()->json([
            'data' => $lstDiaDanh
        ],200);
    }
    public function show($id)
    {
        $diaDanh = DiaDanh::all();
        
        // with(['HinhAnhs' => function ($query) {
        //     $query->where('loai_hinh_anh', '=', 1)->select('id', 'dia_danh_id', 'hinh_anh', 'loai_hinh_anh')->orderBy('created_at');
        // }])->whereId($id)->get();
        // foreach ($diaDanh as $dia) {
        //     $this->fixImage($dia->hinhAnh);
        // }
        return response()->json([
            'data' => $diaDanh
        ], 200);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
