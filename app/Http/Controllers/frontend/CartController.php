<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;

use App\Models\products;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('frontend.cart', compact('cart'));
    }
    public function add(Request $request)
    {
        $product = products::find($request->id);
        $cart = session()->get('cart', []);

        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity']++;
        } else {
            $cart[$request->id] = [
                "id" => $product->id,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "promotion" => $product->promotion,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        // session()->forget('cart');
        // dd($cart);
        ;
        return redirect()->route('cart');
    }
    public function remove(Request $request)
    {
        // $data = $request->id;
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
        }
        return redirect()->back();
    }
    public function update(Request $request)
    {
        if (($request->id) && ($request->quantity)){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
        }
        return redirect()->back();
    }
}
