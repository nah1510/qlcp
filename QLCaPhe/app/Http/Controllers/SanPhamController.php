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
}
