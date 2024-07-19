<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use Auth;
class LogonController
{
    public function index(){
        return view('backend.logon');
    }
    public function postLogon(Request $request){
        if(Auth::attempt(['email'=> $request->email, 'password' => $request->password,'role'=>1])){
            return redirect()->route('admin.view_dashboard');
        }else{
            return redirect()->back();
        }
        
    }
    public function sign_out(){
        Auth::logout();
        return redirect()->route('/');
    }
}
