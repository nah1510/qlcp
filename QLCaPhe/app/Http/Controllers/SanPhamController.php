<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;
use App\LoaiSanPham;

class SanPhamController extends Controller
{
    public function getList()
    {
        $sanpham = SanPham::all();
        $loaisanpham = LoaiSanPham::all();
        return view('admin.sanpham.list',['sanpham'=>$sanpham] );
    }
    
    public function Edit()
    {
        if (isset($_GET["id"]))
        {
            $sanpham = SanPham::find($_GET["id"]);
            $loaisanpham = LoaiSanPham::all();
            return view('admin.sanpham.edit',['sanpham'=>$sanpham, 'loaisanpham'=>$loaisanpham]);
        }
        else
        {
            $sanpham = SanPham::all();
            return redirect('sanpham/list');
        }
    }

    public function Add()
    {
        $loaisanpham = LoaiSanPham::all();
        return view('admin.sanpham.add',['loaisanpham'=>$loaisanpham]);
    }

    public function postAdd(Request $request)
    {
        $sanpham = new SanPham;
        $sanpham->name = $request->name;
        $sanpham->price = $request->price;
        $sanpham->status = 1;
        $sanpham->loaisanpham = $request->loaisanpham;
        $sanpham->save();
        return redirect('sanpham/add')->with('message','Thêm thành công!');
    }

    public function postEdit(Request $request)
    {   

        $sanpham = SanPham::find($request->id);
        $sanpham->name = $request->name;
        $sanpham->price = $request->price;
        $sanpham->status = $request->status;
        $sanpham->loaisanpham = $request->loaisanpham;
        $sanpham->save();
        $url = "sanpham/edit?id=".$request->id;
        return redirect($url)->with('message','Sửa thành công!');
    }

    public function Delete($id)
    {   

        $sanpham = SanPham::find($id);
        $sanpham->delete();
        return redirect("sanpham")->with('message','Xóa thành công!');
    }
}
