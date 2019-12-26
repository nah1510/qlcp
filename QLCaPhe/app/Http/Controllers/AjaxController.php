<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CT_HoaDon;
use App\HoaDon;
use App\SanPham;
use App\KhachHang;
use App\NhanVien;
use App\NgayNghi;
use App\ThuongPhat;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate \ Foundation \ Application;

class AjaxController extends Controller
{

    public function save_bill(Request $request) {
        $hoadon = new HoaDon;
        $hoadon->price = $request->total_bill;
        
        if($request->customer_id){
            $hoadon->khachhang = $request->customer_id;
            $khachang = KhachHang::find($request->customer_id);
            $khachang->point = $khachang->point +  $request->total_bill /100;
            $khachang->save();
        }
        $hoadon->discount = $request->discount;
        $hoadon->initial_price = $request->initial_price;
        $hoadon->nhanvien = Auth::user()->id;
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
            $sanpham = SanPham::where('status','=',1 )->get();
        else
            $sanpham = SanPham::where('category','=',$request->id )->where('status','=',1 )->get();      
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
                "point"=>$value['point'],
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
                "khachhang"=>$name,    
                "nhanvien"=>NhanVien::find($value['nhanvien'])->name,
                "email"=>NhanVien::find($value['nhanvien'])->email,
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
            );
            array_push($array,$array_onece);
        }
        echo json_encode($array);
    }

    public function day_off(Request $request) {
        $array=array();
        $nhanvien = NhanVien::where('role','!=','admin' )->get();  
        foreach ($nhanvien as $key => $value) {
            $subs = ThuongPhat::where([
                ['staff', '=', $value->id],
                ['month', '=', $request->month],
                ['bonus', '=', 0],
            ])->sum('money');
            $bonus = ThuongPhat::where([
                ['staff', '=', $value->id],
                ['month', '=', $request->month],
                ['bonus', '=', 1],
            ])->sum('money');
            $array_onece=array(
                "data"=>$value,
                "expected_salary"=>$bonus-$subs+$value->salary,
                "DayOffTotal"=>NgayNghi::where([
                    ['nhanvien', '=', $value->id],
                    ['month', '=', $request->month],          
                ])->count(),   
                "subs"=>$subs,
                "bonus"=> $bonus,
            );
            array_push($array,$array_onece);
        }
        echo json_encode($array);
    }

    public function day_off_one(Request $request)
    {
        $NgayNghi = NgayNghi::where([
            ['nhanvien', '=', $request->id],
            ['month', '=', $request->month],          
        ])->orderBy('date')->get();
        echo json_encode($NgayNghi);
    }

    public function ajax_bonus(Request $request)
    {
        $bonus = ThuongPhat::where([
            ['staff', '=', $request->id],
            ['month', '=', $request->month],
            ['bonus', '=', $request->bonus],
        ])->get();
        echo json_encode($bonus);
    }
    
    public function SPBanCHay(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $array=array();
        $CT_HoaDon = DB::table('ct_hoadon')
        ->select(DB::raw('SUM(amount) as soluong, sanpham ,SUM(price) as thanhtien'))
        ->whereBetween('created_at',[$from, $to] ) 
        ->groupBy('sanpham')
        ->orderBy('soluong', 'desc')
        ->limit(5)
        ->get();
        //$sanpham = SanPham::join('ct_hoadon', 'ct_hoadon.sanpham', '=', 'sanpham.id')->get();
        //$CT_HoaDon = CT_HoaDon::join('sanpham', 'ct_hoadon.sanpham', '=', 'sanpham.id')->get();
        
        foreach ($CT_HoaDon as $key => $value) {
            $sanpham = SanPham::find($value->sanpham);
            $array_onece=array(
                "sanpham"=>$sanpham,
                "soluong"=>$value->soluong,
                "thanhtien"=>$value->thanhtien,
            );
            array_push($array,$array_onece);
        }
        echo json_encode($array);
    }
}
