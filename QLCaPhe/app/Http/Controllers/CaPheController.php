<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Illuminate\Support\MessageBag;
class CaPheController extends Controller
{
    public function getIndex(){
    	return view('welcome');
    }
    public function login(){
    	
    	return view('login');
    }

     public function test(){
        
        return view('test',$user);
    }


}
