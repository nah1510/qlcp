<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;
use App\LoaiSanPham;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class OderController extends Controller
{
    public function getIndex()
    {
        $loaisanpham = LoaiSanPham::all();
        $sanpham = SanPham::all();
        return view('admin.banhang.index',['loaisanpham'=>$loaisanpham,'sanpham'=>$sanpham]);
    }
}
