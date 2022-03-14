<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VungMien;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class VungMienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function fixImage(VungMien $vungmien){
        if(Storage::disk('public')->exists($vungmien->hinhanh)){
            $vungmien -> hinhanh = Storage::url($vungmien->hinhanh);
        }else{
            $vungmien->image = 'image/no_image_placeholder.png';
        }
    }
    public function index()
    {
        $lstVungMien = VungMien::all();
        foreach($lstVungMien as $vu)
        {
            $this->fixImage($vu);
        }
        return view('vungmien.vungmien_index',[
            'title' => 'Quản lí vùng miền',
            'lstVungMien' => $lstVungMien
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vungmien.vungmien_create',[
            'title' => 'Tạo vùng miền '
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
        $vungmien = new VungMien();
        $vungmien ->fill([
            'ten_vung_mien' => $request->input('ten_vung_mien1'),
            'hinhanh' => ''
        ]);
        $vungmien->save();
        if($request->hasFile('hinhanh')){
            $vungmien->hinhanh = $request->file('hinhanh') -> store('hinhanh/vu'.$vungmien->id,'public');
        }
        $vungmien->save();
        return redirect::route('vungmien.index',[
            'vungmien' => $vungmien
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(VungMien $vungmien)
    {
        $this->fixImage($vungmien);
        return view('vungmien.vungmien_show',[
            'title' => 'Cập nhật vùng miền',
            'vungmien' => $vungmien
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(VungMien $vungmien)
    {
        $this->fixImage($vungmien);

        return view('vungmien.vungmien_edit',[
            'title' => 'Chỉnh sửa địa danh',
            'vungmien' => $vungmien,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VungMien $vungmien)
    {
        if($request->hasFile('hinhanh')){
            $vungmien->hinhanh = $request->file('hinhanh')->store('hinhanh/vu'.$vungmien->id,'public');
        }
        $vungmien ->fill([
            'ten_vung_mien' => $request->input('ten_vung_mien1'),
        ]);
        $vungmien->save();
        return redirect::route('vungmien.index',[
            'vungmien' => $vungmien
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(VungMien $vungmien)
    {
        $vungmien->delete();
        return redirect::route('vungmien.index');
    }
}
