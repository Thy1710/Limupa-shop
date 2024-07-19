<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Models\categories;
class CategoryController
{
    public function view_categories_list(){
        $categories = categories::orderBy('id')->get();
        return view('backend.pages.category.categories-list',compact('categories'));
    }
    public function create(){
        return view('backend.pages.category.form-add-categories');
    }
    public function store(Request $request){
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string|max:255',
        ]);
        categories::create($validateData);
        return redirect()->route('categories-list')->with('success', 'Danh mục đã được thêm thành công');
    }
    public function destroy($id){
        $categories = categories::find($id);
        $categories->delete();
        return redirect()->route('categories-list')->with('success', 'Danh mục đã được xóa');
    }
    public function edit($id){
        $categories = categories::findOrFail($id);
        return view ('backend.pages.category.form-edit-categories',compact('categories'));
    }
    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'status' => 'required|string|max:255'
    ]);

    $categories = categories::findOrFail($id);
    $categories->name = $request->input('name');
    $categories->description = $request->input('description');
    $categories->status = $request->input('status');
    $categories->save();

    return redirect()->route('categories-list')->with('success', 'Danh mục đã được cập nhật thành công');
}
}
