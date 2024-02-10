<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Register;
use Hash;

class RegisterController extends Controller
{
    function register(){
        return view('admin.register');
    }

    function regsubmit(Request $request){
        $request->validate([          
          'name' => 'required',
          'email' => 'required',
          'password' => 'required',
          'phone'=>'required',
          'adress'=>'required',
        ]);

        $register=new Register();
        $register->name=$request->name;
        $register->email=$request->email;
        $register->phone=$request->phone;
        $register->adress=$request->adress;
        $register->password=Hash::make($request->password);
        $register->save();
        return response()->json([
            'status'=>'success'
        ]);
    }
}
