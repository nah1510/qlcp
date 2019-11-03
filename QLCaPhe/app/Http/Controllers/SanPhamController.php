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
}
