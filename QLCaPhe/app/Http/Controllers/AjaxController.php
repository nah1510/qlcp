<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CT_HoaDon;
use App\HoaDon;
use App\SanPham;
use App\KhachHang;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate \ Foundation \ Application;

class AjaxController extends Controller
{

    public function save_bill(Request $request) {
        $hoadon = new HoaDon;
        $hoadon->price = $request->total_bill;
        $hoadon->khachhang = $request->customer_id;
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

    public function find_customer(Request $request) {


        $khachang = KhachHang::where('phone','=',$request->phone )->get();  
        if(count($khachang)==0)    
        {
            echo "false";
            exit;
        }
        foreach ($khachang as $key => $value) {
            $array_onece=array(
                "id"=>$value['id'],
                "phone"=>$value['phone'], 
                "name"=>$value['name'], 
                "email"=>$value['email'],
                "updated_at"=>$value['updated_at'],  
                "created_at"=>$value['created_at'],
            );
        }
        echo json_encode($array_onece);
    
    }

    public function thong_ke(Request $request) {
        $array=array();
        $from = $request->from;
        $to = $request->to;
        $hoadon = HoaDon::whereBetween('created_at',[$from, $to] )->get();  
        
        foreach ($hoadon as $key => $value) {
            if(KhachHang::find($value['khachhang']))
                $name = KhachHang::find($value['khachhang'])->name;
                else $name="Chưa Đăng Ký";
            $array_onece=array(
                "data"=>$value,
                "khachhang"=>$name     
            );
            array_push($array,$array_onece);
        }
        echo json_encode($array);
    }

    public function CT_hoa_don(Request $request) {
        $array=array();
        $id = $request->id;
        $ct_hoadon = CT_HoaDon::where('hoadon',$id )->get();  
        foreach ($ct_hoadon as $key => $value) {
            $array_onece=array(
                "data"=>$value,
                "sanpham"=>SanPham::find($value['sanpham'])->name     
            );
            array_push($array,$array_onece);
        }
        echo json_encode($array);
    }
}
