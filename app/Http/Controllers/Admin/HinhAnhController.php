<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\DiaDanh;
use App\Models\HinhAnh;

class HinhAnhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function fixImage(HinhAnh $hinhanh)
    {
        if(Storage::disk('public')->exists($hinhanh -> hinh_anh)){
            $hinhanh->hinh_anh = Storage::url($hinhanh->hinh_anh);
        }else{
            
                $hinhanh->hinh_anh ='/image/no_image_placeholder.png';
            
        }
    }
    public function index()
    {
        $lstHinh = HinhAnh::with('DiaDanh:id,ten_dia_danh,ngay_dang,vi_do,kinh_do,mo_ta','Post:id,body,image,user_id,diadanhid'
        )->where('loai_hinh_anh', '=', '1' )->get();
        $lstHinh = HinhAnh::all();
        foreach($lstHinh as $hinh_anh){
            $this->fixImage($hinh_anh);
        }
        return view('hinhanh.hinhanh_index',[
            'title' => 'Danh sách hình ảnh',
            'lstHinh' => $lstHinh,
            // 'hinh' => $lsthinh
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lstDiaDanh = DiaDanh::all();
        return view('hinhanh.hinhanh_create',[
            'title' => 'Thêm hình ảnh',
            'lstDiaDanh' => $lstDiaDanh,
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
        $hinhanh = new HinhAnh();
        $hinhanh -> fill([
            // 'ten_hinh_anh' => 'tenHinh',
            'hinh_anh' => '',
            'dia_danh_id' => $request->input('dia_danh_id'),
            'loai_hinh_anh' => $request->input('loai')
        ]);
        $hinhanh->save();
        if ($request->hasFile('hinh_anh')) {
            $hinhanh->hinh_anh = $request->file('hinh_anh') -> store('image/hinhanh/'.$hinhanh->id,'public');
        }
        $hinhanh->save();
        // $lsthinh_anh = HinhAnh::with(['DiaDanh:id,ten_dia_danh,ngay_dang,vi_do,kinh_do,mo_ta'])->where('loai_hinh_anh', '=', '1')->get();
        $lsthinh_anh = HinhAnh::all();
        $hinhanh -> save();
        return Redirect::route('hinhanh.index',[
            'hinh_anh' => $hinhanh,
            'lstHinh' => $lsthinh_anh
        ]);
    }
    public function edit(HinhAnh $hinhanh)
    {
        $this->fixImage($hinhanh);
        $lstDiaDanh = DiaDanh::all();
        return view('hinhanh.hinhanh_edit',[
            'title' => 'Chỉnh sửa  ',
            'hinhanh' => $hinhanh,
            'lstDiaDanh' => $lstDiaDanh
        ]);
    }
    public function show(HinhAnh $hinhanh)
    {
        $this->fixImage($hinhanh);
        return view('hinhanh.hinhanh_show',['title' => 'Chi tiết hình ảnh','hinhanh' => $hinhanh]);
    }


    public function update(Request $request, HinhAnh $hinhanh)
    {
        if($request->hasFile('hinh_anh'))
        {
            $hinhanh->hinh_anh = $request->file('hinh_anh')->store('image/hinh/'.$hinhanh->id,'public');
        }
        $hinhanh->fill([
            'loai_hinh_anh' => $request->input('loai'),
            'dia_danh_id' => $request->input('diadanhid'),
            'post_id' => $request->input('postid')
        ]);
        $hinhanh->save();
        return redirect::route('hinhanh.show',['hinhanh' => $hinhanh]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(HinhAnh $hinhanh)
    {
        $hinhanh->delete();
        return Redirect::route('hinhanh.index');
    }
}
