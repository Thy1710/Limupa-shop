<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index(){
        return view('frontend.login');
    }
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);
    
        // Kiểm tra nếu có lỗi xác thực
        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }
        if(Auth::attempt(['email'=> $request->email, 'password' => $request->password])){
            return redirect()->route('/');
        }
        return redirect()->back();
    }
    public function logout(){
        Auth::logout();
        return redirect()->back();
    }
}
