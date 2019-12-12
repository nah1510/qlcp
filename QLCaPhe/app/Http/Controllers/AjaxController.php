<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CT_HoaDon;
use App\HoaDon;
use App\SanPham;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate \ Foundation \ Application;

class AjaxController extends Controller
{

    public function save_bill(Request $request) {
        $hoadon = new HoaDon;
        $hoadon->price = $request->total_bill;
        $hoadon->save();
        foreach ($request->bill as $key => $value) {
            $CT_HoaDon = new CT_HoaDon;
            $CT_HoaDon->hoadon= $hoadon->id;
            $CT_HoaDon->sanpham = $value[0];
            $CT_HoaDon->unit_price = $value[1];
            $CT_HoaDon->amount = $value[2];
            $CT_HoaDon->price = $value[3];
            $CT_HoaDon->save();
        }
        echo json_encode($hoadon->id);
    
    }

    public function list_san_pham(Request $request) {
        $array=array();
        if($request->id==0)
            $sanpham = SanPham::all();
        else
            $sanpham = SanPham::where('loaisanpham','=',$request->id )->get();      
        foreach ($sanpham as $key => $value) {
            $array_onece=array(
                "id"=>$value['id'],
                "image"=>$value['image'], 
                "name"=>$value['name'], 
                "price"=>$value['price']);
            array_push($array,$array_onece);
        }
        echo json_encode($array);
    
    }

}
