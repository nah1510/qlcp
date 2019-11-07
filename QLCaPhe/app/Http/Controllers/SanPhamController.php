<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;

class SanPhamController extends Controller
{
    public function getList()
    {
        $sanpham = SanPham::all();
        return view('admin.sanpham.list',['sanpham'=>$sanpham]);
    }
    
    public function Edit()
    {
        if (isset($_GET["id"]))
        {
            $sanpham = SanPham::find($_GET["id"]);
            return view('admin.sanpham.edit',['sanpham'=>$sanpham]);
        }
        else
        {
            $sanpham = SanPham::all();
            return redirect('sanpham/list');
        }
    }

    public function Add()
    {
        return view('admin.sanpham.add');
    }

    public function postAdd(Request $request)
    {
        $sanpham = new SanPham;
        $sanpham->name = $request->name;
        $sanpham->price = $request->price;
        $sanpham->status = 1;
        $sanpham->save();
        return redirect('sanpham/add')->with('message','Thêm thành công!');
    }

    public function postEdit(Request $request)
    {   

        $sanpham = SanPham::find($request->id);
        $sanpham->name = $request->name;
        $sanpham->price = $request->price;
        $sanpham->status = $request->status;
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
