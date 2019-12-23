<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KhachHang;

class KhachHangController extends Controller
{
    public function getList()
    {
        $khachhang = KhachHang::all();
        return view('admin.khachhang.list',['khachhang'=>$khachhang] );
    }
    
    public function Edit()
    {
        if (isset($_GET["id"]))
        {
            $khachhang = KhachHang::find($_GET["id"]);
            return view('admin.khachhang.edit',['khachhang'=>$khachhang]);
        }
        else
        {
            $khachhang = KhachHang::all();
            return redirect('khachhang/list');
        }
    }

    public function Add()
    {
        return view('admin.khachhang.add');
    }

    public function postAdd(Request $request)
    {
        $khachhang = new KhachHang;
        $khachhang->name = $request->name;
        $khachhang->email = $request->email;
        $khachhang->phone = $request->phone;
        $khachhang->point = 0;
        $khachhang->save();
        return redirect('khachhang/add')->with('message','Thêm thành công!');
    }

    public function postEdit(Request $request)
    {   
        $khachhang = KhachHang::find($request->id);
        $khachhang->name = $request->name;
        $khachhang->email = $request->email;
        $khachhang->phone = $request->phone;
        $khachhang->save();
        $url = "khachhang/edit?id=".$request->id;
        return redirect($url)->with('message','Sửa thành công!');
    }

    public function Delete($id)
    {   

        $khachhang = KhachHang::find($id);
        $khachhang->delete();
        return redirect("khachhang/list")->with('message','Xóa thành công!');
    }
}
