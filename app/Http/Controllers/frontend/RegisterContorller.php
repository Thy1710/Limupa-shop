<?php

namespace App\Http\Controllers\frontend;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class RegisterContorller extends Controller
{
    public function index()
    {
        return view('frontend.register');
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }
        $request->merge(['password' => Hash::make($request->password)]);
        User::create($request->all());
        return redirect()->route('login');
    }
    
}
