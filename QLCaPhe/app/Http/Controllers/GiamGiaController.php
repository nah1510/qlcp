<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GiamGia;

class GiamGiaController extends Controller
{
    public function getList()
    {
        $giamgia = GiamGia::all();
        return view('admin.giamgia.index',['giamgia'=>$giamgia] );
    }
    
    public function Edit()
    {
        if (isset($_GET["id"]))
        {
            $giamgia = GiamGia::find($_GET["id"]);
            return view('admin.giamgia.edit',['giamgia'=>$giamgia]);
        }
        else
        {
            $giamgia = GiamGia::all();
            return redirect('giamgia/list');
        }
    }

    public function Add()
    {
        return view('admin.giamgia.add');
    }

    public function postAdd(Request $request)
    {
        
        if(GiamGia::where('code',$request->code)->count()){
            return redirect('giamgia/add')->with('fail','Mã giảm giá này đã được tạo!');
        }
        $giamgia = new GiamGia;
        $giamgia->code = $request->code;
        $giamgia->type = $request->type;
        $giamgia->min_bill = $request->min_bill;
        $giamgia->max_discount = $request->max_discount;
        $giamgia->discount  = $request->discount ;
        $giamgia->status  = 1;
        $giamgia->save();
        return redirect('giamgia/add')->with('message','Thêm thành công!');
    }

    public function postEdit(Request $request)
    {   
        $giamgia = GiamGia::find($request->id);
        if(GiamGia::where('code',$request->code)->count()>0 && $giamgia->code != $request->code){
            return redirect('giamgia/add')->with('fail','Mã giảm giá này đã được tạo!');
        }
        $giamgia->code = $request->code;
        $giamgia->type = $request->type;
        $giamgia->min_bill = $request->min_bill;
        $giamgia->max_discount = $request->max_discount;
        $giamgia->discount  = $request->discount ;
        $giamgia->status  = $request->status;
        $giamgia->save();
        $url = "giamgia/edit?id=".$request->id;
        return redirect($url)->with('message','Sửa thành công!');
    }

    public function Delete($id)
    {   

        $giamgia = GiamGia::find($id);
        $giamgia->delete();
        return redirect("giamgia/list")->with('message','Xóa thành công!');
    }
}
