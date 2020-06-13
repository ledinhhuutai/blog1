<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index () {
        return view('admin.products.index');
    }

    public function create () {
        $cates = Category::all();
        return view('admin.products.create', compact('cates'));
    }

    public function saveCreate (Request $request) {
        $product = new Product();
        
        $data = $request->all();

        $originalName = $request->image->getClientOriginalName();
        $filename = str_replace(' ', '-', $originalName);
        $filename = uniqid() . '-' . $filename;
        $path = $request->file('image')->storeAs('products', $filename);
        $data['image'] = 'images/'. $path;

        $product->fill($data);
        $product->save();

        return redirect()->route('products.list');
    }
}
