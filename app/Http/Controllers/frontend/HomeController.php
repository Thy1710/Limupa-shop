<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Models\products;
class HomeController extends Controller
{
    public function index(){
        $hotProducts = products::where('status', 'hot')->get();
        $bestsellerProducts = products::where('status', 'Bestseller')->get();
        $newProducts = products::orderBy('id', 'desc')->get();
        $promoProducts = products::where('promotion', '>', 0)->get();
        return view('frontend.home',compact('hotProducts','bestsellerProducts','newProducts','promoProducts'));
    }
}
