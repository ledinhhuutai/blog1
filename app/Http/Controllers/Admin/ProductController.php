<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Products\CreateRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index () {
        $products = Product::with('category')->get();
        return view('admin.products.index', compact('products'));
    }

    public function create () {
        $cates = Category::all();
        return view('admin.products.create', compact('cates'));
    }

    public function saveCreate (CreateRequest $request) {
        $product = new Product();

        $data = $request->all();

        if ($request->hasFile('image')) {
            $originalName = $request->image->getClientOriginalName();
            $filename = str_replace(' ', '-', $originalName);
            $filename = uniqid() . '-' . $filename;
            $path = $request->file('image')->storeAs('products', $filename);
            $data['image'] = '/images/'. $path;
        }

        $product->fill($data);
        $product->save();

        return redirect()->route('products.list');
    }

    public function edit ($id) {
        $product = Product::find($id);
        $cates = Category::all();
        return view('admin.products.edit', compact('product','cates'));
    }

    public function saveEdit (Request $request, $id) {
        $product = Product::find($id);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $originalName = $request->image->getClientOriginalName();
            $filename = str_replace('','-', $originalName);
            $filename = uniqid() . '-' . $filename;
            $path = $request->image->storeAs('products', $filename);

            $data['image'] = '/images/' . $path;
        }

        $product->fill($data);
        $product->save();

        return redirect()->route('products.list');
    }

    public function delete ($id) {
        $product = Product::find($id);
//        $product->delete();
    }

    public function test () {
        $products = Product::find(5);
        dd($products->category->name);
    }
}
