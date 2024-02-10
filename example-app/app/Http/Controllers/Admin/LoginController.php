<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Session;
// use Hash;

use Auth;
use Session;

class LoginController extends Controller
{
    public function loginindex(){
        return view('admin.login');
    }

    public function adminlogin(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        if(Auth::guard('register')->attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect('/admin/dashboard');
        }else{
            Session::flash('err','invalid pass');
            return redirect()->back();
        }


    }
    public function logout(){
        Auth::guard('register')->logout();
        return redirect('/admin/login');
    }



}
