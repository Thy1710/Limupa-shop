<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('frontend.contact');
    }
}
