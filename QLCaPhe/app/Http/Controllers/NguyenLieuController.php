<?php

namespace App\Http\Controllers;
use App\NguyenLieu;
use App\NKNguyenLieu;
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
        return redirect("nguyenlieu/list")->with('message','Xóa thành công!');
    }

    public function postKiemKe(Request $request){
        
        $nguyenlieu = NguyenLieu::find($request->id);
        $NKNguyenLieu = new NKNguyenLieu;
        if($request->type == 0)
        {
            $nguyenlieu->amount = $nguyenlieu->amount + $request->change;
            $NKNguyenLieu->change_amount = $request->change;       
        }
        else{
            if($nguyenlieu->amount < $request->change)
                return redirect()->back()->with('fail','Số lượng tồn sau khi kiểm kê không được lớn hơn số lượng tồn trước đó!');
            $NKNguyenLieu->change_amount =$nguyenlieu->amount - $request->change;
            $nguyenlieu->amount = $request->change;
        }
        $nguyenlieu->save();
        $NKNguyenLieu->type = $request->type;
        $NKNguyenLieu->amount = $nguyenlieu->amount;
        $NKNguyenLieu->nguyenlieu = $nguyenlieu->id;
        $NKNguyenLieu->save();
        return redirect()->back()->with('message','Thêm thành công!');
    }
}
