<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\DiaDanh;
use App\Models\User;
use App\Models\Post;
use App\Models\HinhAnh;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StoreDiaDanhRequest;
use App\Http\Requests\UpdateDiaDanhRequest;

class DiaDanhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function fixImage(DiaDanh $diadanh){
            if(Storage::disk('public')->exists($diadanh -> hinhanh)){
                $diadanh -> hinhanh = Storage::url($diadanh -> hinhanh);
            }else{
                $diadanh->image = 'image/no_image_placeholder.png';
            }
    }
    public function index()
    {
        $lstDiaDanh = DiaDanh ::all();
        foreach($lstDiaDanh as $dia)
        {
            $this->fixImage($dia);
        }
        // with(
        //     ['HinhAnh' => function($query){
        //         $query -> where('loai_hinh_anh', '=', 1)
        //         ->select('id','hinh_anh','loai_hinh_anh','dia_danh_id','post_id')
        //         ->orderBy('created_at');
        //     }])->get();
        return view('diadanh.diadanh_index',[
            'title' => 'Quản lí địa danh',
            'lstDiaDanh' => $lstDiaDanh
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request )
    {
        
        return view('diadanh.diadanh_create',[
            'title' => 'Tạo địa danh mới',
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDiaDanhRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        
        $diadanh = new DiaDanh();
        $diadanh -> fill([
            'ten_dia_danh' => $request->input('ten'),
            'hinhanh' => '',
            'ngay_dang'    => $request->input('ngay'),
            'kinh_do'      => $request->input('kinh_do'),
            'vi_do'        => $request->input('vi_do'),
            'mo_ta'        => $request->input('mo_ta')            
        ]);
        $diadanh->save();
        // $hinhAnh = new HinhAnh();
        // $hinhAnh -> fill([
        //     'dia_danh_id' => $diadanh->id,
        //     'loai_hinh_anh' => 1,
        //     'hinh_anh' => '',
        // ]);
        // $hinhAnh->save();
        // if($request->hasFile('hinh_anh')){
        //     $hinhAnh->hinh_anh = Storage::disk('public')->put('image', $request->file('hinh_anh'));
        //     //$hinhAnh->hinh_anh = $request->file('image') -> store('image/hinhanh'.$hinhAnh->id.'public');
        // }
        // $hinhAnh->save();
        if($request->hasFile('hinhanh')){
            $diadanh->hinhanh = $request->file('hinhanh') -> store('hinhanh/ha'.$diadanh->id,'public');
        }
        $diadanh->save();
        return redirect::route('diadanh.index',[
            'diadanh' => $diadanh,
            // 'hinhAnh' => $hinhAnh
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DiaDanh
     * @return \Illuminate\Http\Response
     */
    public function show(DiaDanh $diadanh)
    {
        $this->fixImage($diadanh);
        // $lstDiaDanh = DiaDanh::all();
        return view('diadanh.diadanh_show',[
            'title' => 'Cập nhật địa danh',
            'diadanh' => $diadanh
            // 'diadanh' => $lstDiaDanh
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DiaDanh  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(DiaDanh $diadanh)
    {
        // $hinhAnh = HinhAnh::where('dia_danh_id', '=' , $diadanh->id)->orderBy('created_at','desc')->first();
        $this->fixImage($diadanh);

        return view('diadanh.diadanh_edit',[
            'title' => 'Chỉnh sửa địa danh',
            'diadanh' => $diadanh,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDiaDanhRequest  $request
     * @param  \App\Models\DiaDanh
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DiaDanh $diadanh)
    {
        if($request->hasFile('hinhanh')){
            $diadanh->hinhanh = $request->file('hinhanh')->store('hinhanh/ha'.$diadanh->id,'public');
        }
        $diadanh -> fill([
            'ten_dia_danh' => $request->input('ten'),
            'ngay_dang'    => $request->input('ngay'),
            'kinh_do'      => $request->input('kinh_do'),
            'vi_do'        => $request->input('vi_do'),
            'mo_ta'        => $request->input('mo_ta')            
        ]);
        $diadanh -> fill([
            'ten_dia_danh' => $request->input('ten'),
            'ngay_dang'    => $request->input('ngay'),
            'kinh_do'      => $request->input('kinh_do'),
            'vi_do'        => $request->input('vi_do'),
            'mo_ta'        => $request->input('mo_ta'),
        ]);
        $diadanh->save();
        // if($request-> hasFile('hinh_anh')){
        //     $hinhAnh = HinhAnh::where('dia_danh_id', '=' , $diadanh->id)->orderBy('created_at','desc')->first();
        //     $hinhAnh->hinh_anh = Storage::disk('public')->put('image', $request->file('hinhanh'));
        //     $hinhAnh->save();
        // }
        return redirect::route('diadanh.index',[
            'diadanh' => $diadanh
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DiaDanh   $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiaDanh $diadanh)
    {
        //  $hinhAnh = HinhAnh::where('dia_danh_id', '=', $diadanh->id);
        // $baiViet = Post::where('dia_danh_id', '=', $diaDanh->id);
        // $baiViet->delete();
        //  $hinhAnh->delete();
        // $diaDanh->delete();
        // $diaDanh->delete();
        $diadanh->delete();
        return redirect::route('diadanh.index');
    }

    public function search(Request $request)
    {
        $output = '';
        $diadanh = DiaDanh::where('ten_dia_danh', 'LIKE' , '%' . $request->keyword . '%')->get();

        foreach ($diadanh as $diadanH)
        {
            $output .= '
            <tr>
            <td>'.$diadanH->id.'</td>
            <td>  
                    '.$diadanH->ten_dia_danh.'
            </td>
            // <td> <img style="width:100px;max-height:100px;object-fit:contain" 
            // src="'.$dia->hinhanh.'"></td>
            <td>'.$diadanH->kinh_do.'</td>
            <td>'.$diadanH->vi_do.'</td>
            <td>'.$diadanH->mo_ta.'</td>
            <td>'.$diadanH->ngay_dang.'</td>
            </tr>
            ';
        }
        return response()->json($output);
    }
}
