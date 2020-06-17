<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index ($id) {
        $cates = Category::all();
        $products = Category::find($id)->products;
        $data = compact('cates', 'products');
        return view('client.category', $data);
    }
}
