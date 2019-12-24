<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;
use App\LoaiSanPham;

class LoaiSanPhamController extends Controller
{
    public function getList()
    {
        $loaisanpham = LoaiSanPham::all();
        return view('admin.loaisanpham.list',['loaisanpham'=>$loaisanpham]);
    }
    
    public function Edit()
    {
        if (isset($_GET["id"]))
        {
            $loaisanpham = LoaiSanPham::find($_GET["id"]);
            return view('admin.loaisanpham.edit',['loaisanpham'=>$loaisanpham]);
        }
        else
        {
            $loaisanpham = LoaiSanPham::all();
            return redirect('loaisanpham/list');
        }
    }

    public function Add()
    {
        return view('admin.loaisanpham.add');
    }

    public function postAdd(Request $request)
    {
        $loaisanpham = new LoaiSanPham;
        $loaisanpham->name = $request->name;
        $loaisanpham->save();
        return redirect('loaisanpham/list')->with('message','Thêm thành công!');
    }

    public function postEdit(Request $request)
    {   

        $loaisanpham = LoaiSanPham::find($request->id);
        $loaisanpham->name = $request->name;
        $loaisanpham->save();
        $url = "loaisanpham/edit?id=".$request->id;
        return redirect($url)->with('message','Sửa thành công!');
    }

    public function Delete($id)
    {   

        $loaisanpham = LoaiSanPham::find($id);
        $sp=SanPham::where('category', $id)->count();
        if($sp!=0)
        return redirect("loaisanpham/list")->with('error','Không thể xóa! Đã có sản phẩm có loại sản phẩm này.');
        else  {
            $loaisanpham->delete();
            return redirect("loaisanpham/list")->with('message','Xóa thành công!');
        }
    }
}
