<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\NhanVien;
use Illuminate\Support\MessageBag;
class CaPheController extends Controller
{
    public function getIndex(){
    	return view('welcome');
    }
    public function login(){
    	
    	return view('taikhoan.login');
    }
    
     public function test1(){
        $id = Auth::user()->id;
        $nhanvien = NhanVien::find($id);
        return view('nhanvien.index',['user'=>$nhanvien]);
    }

    public function test(){
        return view('admin.ngaynghi.index');
    }

    public function ThongKeIndex(){
        

        return view('admin.thongke.index');
    }

    
}
