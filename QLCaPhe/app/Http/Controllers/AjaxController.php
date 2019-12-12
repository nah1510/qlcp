<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CT_HoaDon;
use App\HoaDon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AjaxController extends Controller
{
    /*public function save_bill(Request $request)
    {
        $hoadon = new HoaDon;
        $hoadon->price = $request->total_bill;
        if ($hoadon->save()) {
            return Response::json(array('success' => true));
        }
        else
            return Response::json(array('success' => false));
    }*/
    public function save_bill() {
        // Getting all post data
        print_r(Request::all());
    
        }
}
