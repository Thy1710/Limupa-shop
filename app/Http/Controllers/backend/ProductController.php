<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\categories;
use Illuminate\Support\Facades\Storage;

class ProductController
{
    public function view_product_list()
    {
        $products = products::with('category')->get();
        return view('backend.pages.product.product-list', compact('products'));
    }
    public function create()
    {
        $categories = categories::all();
        return view('backend.pages.product.form-add-product', compact('categories'));
    }


    public function store(Request $request)
    {
        // Validate dữ liệu nhập vào từ request
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|integer',
            'promotion' => 'required|integer',
            'quantity' => 'required|integer',
            'color' => 'nullable|string',
            'ram' => 'required|integer',
            'storage' => 'nullable|integer',
            'display' => 'nullable|string',
            'battery_capacity' => 'required|integer',
            'operating_system' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'status' => 'required|string',
            'category_id' => 'nullable|exists:categories,id'
        ]);

        // Xử lý upload ảnh
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->move(public_path('backend/uploaded'), $image->getClientOriginalName());
            $validateData['image'] = $image->getClientOriginalName();
        }
        $product = new products();
        $product->fill($validateData); // Sử dụng fillable để gán dữ liệu từ mảng validateData vào model

        $product->save();

        return redirect()->route('product-list');
    }

    public function edit($id)
    {
        $products = products::findOrFail($id);
        $categories = categories::all();
        return view('backend.pages.product.form-edit-product', compact('products', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|integer',
            'promotion' => 'required|integer',
            'quantity' => 'required|integer',
            'color' => 'nullable|string',
            'ram' => 'required|integer',
            'storage' => 'nullable|integer',
            'display' => 'nullable|string',
            'battery_capacity' => 'required|integer',
            'operating_system' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'status' => 'required|string',
            'category_id' => 'nullable|exists:categories,id'
        ]);
        $products = products::findOrFail($id);
        $products->name = $request->input('name');
        $products->description = $request->input('description');
        $products->price = $request->input('price');
        $products->promotion = $request->input('promotion');
        $products->quantity = $request->input('quantity');
        $products->color = $request->input('color');
        $products->ram = $request->input('ram');
        $products->storage = $request->input('storage');
        $products->display = $request->input('display');
        $products->battery_capacity = $request->input('battery_capacity');
        $products->operating_system = $request->input('operating_system');
        $products->status = $request->input('status');
        $products->category_id = $request->input('category_id');
        if ($request->hasFile('image')) {
            if ($products->image) {
                $oldImagePath = public_path('backend/uploaded' . $products->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $path = $request->file('image')->move('backend/uploaded', $request->file('image')->getClientOriginalName());
            $products->image = $path;
        }
        $products->save();
        return redirect()->route('product-list');
    }
    public function destroy(Request $request, $id)
    {
        $products = products::find($id);
        if ($products->image) {
            $oldImagePath = public_path('backend/uploaded/' . $products->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        $products->delete();
        return redirect()->route('product-list');
    }
}
