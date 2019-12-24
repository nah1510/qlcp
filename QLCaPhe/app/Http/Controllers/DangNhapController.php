<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Illuminate\Support\MessageBag;
use Mail;
use App\User;
use App\NhanVien;
use Illuminate\Support\Str;
class DangNhapController extends Controller
{       

    public function login(){
    	if (Auth::check()) {
            if (Auth::user()->role === "admin")
                return redirect()->intended('/thongke');
                return redirect()->intended('/banhang');
        }
    	return view('taikhoan.login');
    }

    public function postLogin(Request $request) {
 
        $rules = [
            'email' =>'required|email',
            'password' => 'required'
        ];
    	$messages = [
            'email.required' => 'Email là trường bắt buộc',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            //'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            if( Auth::attempt(['email' => $request->email, 'password' =>$request->password])) {

                if (Auth::user()->role === "admin")
                    return redirect()->intended('/thongke');
                    return redirect()->intended('/banhang');
            } else {
                $errors = new MessageBag(['errorlogin' => 'Thông tin đăng nhập không đúng']);
                return redirect()->back()->withInput()->withErrors($errors);
            }
        }
    }

    public function getLogout() {
		Auth::logout();
		return redirect('login')->with('logout','Đăng xuất thành công!');
    }
    
    public function CheckEmail(Request $request) {
        $nhanvien = NhanVien::where('email','=',$request->email )->first();  
        if(!isset($nhanvien))
        {
            echo 0;
            exit;
        }
        $code = Str::random(20);
        $nhanvien->code_reset = $code;
        $nhanvien->save();
        Mail::send( "taikhoan.mail",array('code'=>$code),function($message) use ($nhanvien){
            $message->to($nhanvien->email)->subject('Đặt lại mật khẩu');
        });  
        echo 1;

    }

    public function getLostPass() {
		return view('taikhoan.lost');
    }

    public function postSetPassWord(Request $request) {
        $nhanvien = NhanVien::where('email','=',$request->email )->first();  
        if($nhanvien->code_reset == $request->code){
            if($request->pass == $request->re_pass){
                $nhanvien->password = bcrypt($request->re_pass);
                $nhanvien->save();
                return redirect("login");
            }
        }
    }
    
}