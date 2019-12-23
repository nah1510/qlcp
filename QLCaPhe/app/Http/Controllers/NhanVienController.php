<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NhanVien;
use App\NgayNghi;
use App\ThuongPhat;
use Auth;
use Illuminate\Support\Str;

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
        $nhanvien->salary = $request->salary;
        $nhanvien->role = $request->role;
        $nhanvien->phone = $request->phone;
        $nhanvien->save();
        return redirect('nhanvien/add')->with('message','Thêm thành công!');
    }

    public function postEdit(Request $request)
    {   

        $nhanvien = NhanVien::find($request->id);
        $nhanvien->name = $request->name;
        $nhanvien->email = $request->email;
        $nhanvien->identity_card_number = $request->identity_card_number;
        $nhanvien->salary = $request->salary;
        $nhanvien->role = $request->role;
        $nhanvien->phone = $request->phone;
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

    public function EditImage(Request $request)
    {   
        $id = Auth::user()->id;
        $nhanvien = NhanVien::find($id);
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            
            $file_name = Str::random(4)."_".$nhanvien->name.".".$file->getClientOriginalExtension();
            while(file_exists("upload/".$file_name)){
                $file_name = Str::random(4)."_".$nhanvien->name.".".$file->getClientOriginalExtension();
            }
            $nhanvien->image=$file_name;
            $file->move('upload', $file_name);

        }
        $nhanvien->save();
        $url = "nhanvien/list";
        return redirect($url)->with('message','Đã cập nhập ảnh thành công!');
    }
    public function ChangePass(Request $request)
    {
        $id = Auth::user()->id;
        $nhanvien = NhanVien::find($id);
            if($request->new_pass == $request->confirm_pass){
                $nhanvien->password = bcrypt($request->new_pass);
                $nhanvien->save();
                return redirect("test")->with('message','Đã cập nhập thành công!');
        }
        return redirect("test")->with('fail','Đã cập nhập thành công!');
    }
    public function postDayOff(Request $request)
    {
        $ngaynghi = new NgayNghi;
        $ngaynghi->date =date("Y-m-d", strtotime($request->day)) ;
        $ngaynghi->month =date("m-Y", strtotime($request->day)) ;
        $ngaynghi->nhanvien = $request->id;
        $ngaynghi->save();
        if($request->total>1){
            for ($i=1; $i < $request->total; $i++) { 
                $ngaynghi = new NgayNghi;
                $ngaynghi->nhanvien = $request->id;
                $ngaynghi->date =date("Y-m-d", strtotime($request->day. "+$i days")) ;
                $ngaynghi->month =date("m-Y", strtotime($request->day. "+$i days")) ;
                $ngaynghi->save();
            }
        }
        
        return redirect('nhanvien/list')->with('message','Thêm ngày nghỉ cho nhân viên '.$request->name.' thành công !');
    }

    public function LuongThuong(){
        return view('admin.luongthuong.index');
    }

    public function postAddBonus(Request $request)
    {
        $bonus = new ThuongPhat;
        $bonus->money = $request->money;
        $bonus->info = $request->info;
        $bonus->bonus = $request->bonus;
        $bonus->staff = $request->staff;
        $bonus->month = $request->month;
        $bonus->save();
        return redirect('luong-thuong')->with('message','Thêm thành công!');
    }

    public function DeleteBonus($id)
    {   
        $ThuongPhat = ThuongPhat::find($id);
        $ThuongPhat->delete();
        return redirect("luong-thuong")->with('message','Xóa thành công!');
    }

    public function DeleteDayOff($id)
    {   
        $NgayNghi = NgayNghi::find($id);
        $NgayNghi->delete();
        return redirect("luong-thuong")->with('message','Xóa ngày nghỉ thành công!');
    }
}
