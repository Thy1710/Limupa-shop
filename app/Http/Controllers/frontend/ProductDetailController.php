<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Models\products;
class ProductDetailController extends Controller
{
    public function index($id){
        $product = products::findOrFail($id);
      
        return view('frontend.product-detail',compact('product'));
    }
}
