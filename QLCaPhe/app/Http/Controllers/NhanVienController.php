<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NhanVien;

class NhanVienController extends Controller
{
    public function getList()
    {
        $nhanvien = NhanVien::all();
        return view('admin.nhanvien.list',['nhanvien'=>$nhanvien]);
    }
    
    public function Edit()
    {
        if (isset($_GET["id"]))
        {
            $nhanvien = NhanVien::find($_GET["id"]);
            return view('admin.nhanvien.edit',['nhanvien'=>$nhanvien]);
        }
        else
            return redirect('nhanvien');
    }

    public function Add()
    {
        return view('admin.nhanvien.add');
    }

    public function postAdd(Request $request)
    {
        $nhanvien = new NhanVien;
        $nhanvien->name = $request->name;
        $nhanvien->email = $request->email;
        $nhanvien->identity_card_number = $request->identity_card_number;
        $nhanvien->save();
        return redirect('nhanvien/add')->with('message','Thêm thành công!');
    }

    public function postEdit(Request $request)
    {   

        $nhanvien = NhanVien::find($request->id);
        $nhanvien->name = $request->name;
        $nhanvien->email = $request->email;
        $nhanvien->identity_card_number = $request->identity_card_number;
        $nhanvien->save();
        $url = "nhanvien/edit?id=".$request->id;
        return redirect($url)->with('message','Sửa thành công!');
    }

    public function Delete($id)
    {   

        $nhanvien = NhanVien::find($id);
        $nhanvien->delete();
        return redirect("nhanvien")->with('message','Xóa thành công!');
    }
}
