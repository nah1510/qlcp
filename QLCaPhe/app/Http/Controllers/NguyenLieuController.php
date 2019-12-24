<?php

namespace App\Http\Controllers;
use App\NguyenLieu;
use Illuminate\Http\Request;

class NguyenLieuController extends Controller
{
    public function getList()
    {
        $nguyenlieu = NguyenLieu::all();
        return view('admin.nguyenlieu.list',['nguyenlieu'=>$nguyenlieu]);
    }
    
    public function Edit()
    {
        if (isset($_GET["id"]))
        {
            $nguyenlieu = NguyenLieu::find($_GET["id"]);
            return view('admin.nguyenlieu.edit',['nguyenlieu'=>$nguyenlieu]);
        }
        else
            return redirect('nguyenlieu');
    }

    public function Add()
    {
        return view('admin.nguyenlieu.add');
    }

    public function postAdd(Request $request)
    {
        $nguyenlieu = new NguyenLieu;
        $nguyenlieu->name = $request->name;
        $nguyenlieu->amount = 0;
        $nguyenlieu->calculation_unit = $request->calculation_unit;
        $nguyenlieu->save();
        return redirect('nguyenlieu/add')->with('message','Thêm thành công!');
    }

    public function postEdit(Request $request)
    {   

        $nguyenlieu = NguyenLieu::find($request->id);
        $nguyenlieu->name = $request->name;
        $nguyenlieu->calculation_unit = $request->calculation_unit;
        $nguyenlieu->save();
        $url = "nguyenlieu/edit?id=".$request->id;
        return redirect($url)->with('message','Sửa thành công!');
    }

    public function Delete($id)
    {   
        $nguyenlieu = NguyenLieu::find($id);
        $nguyenlieu->delete();
        return redirect("nguyenlieu")->with('message','Xóa thành công!');
    }
}
