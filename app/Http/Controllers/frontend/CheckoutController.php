<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(){
        return view('frontend.checkout');
    }
}
