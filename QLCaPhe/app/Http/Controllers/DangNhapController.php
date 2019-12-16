<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Illuminate\Support\MessageBag;
use Mail;
use App\User;
class DangNhapController extends Controller
{
        public function postLogin(Request $request) {
        Mail::send( "dashboard",array('email'=>$request["email"]),function($message){
	        $message->to('nah1510@mailinator.com', 'Visitor')->subject('Visitor Feedback!');
	    });    
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
                return redirect()->intended('/login');
            } else {
                $errors = new MessageBag(['errorlogin' => 'Email hoặc mật khẩu không đúng']);
                return redirect()->back()->withInput()->withErrors($errors);
            }
        }
    }

    public function getLogout() {
		Auth::logout();
		return redirect('login')->with('logout','Đăng xuất thành công!');
    }
    
    public function CheckEmail(Request $request) {
        $nhanvien = User::where('email','=',$request->email )->get();  
        if(count($nhanvien)==0)    
        {
            echo 0;
            exit;
        }
        echo 1;
    }

    public function getLostPass() {
		return view('taikhoan.lost');
    }
}
