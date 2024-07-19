<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;

class AboutusController extends Controller
{
    public function index(){
        return view('frontend.about-us');
    }
}
