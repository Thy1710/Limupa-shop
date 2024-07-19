<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index(){
        return view('frontend.promotion');
    }
}
