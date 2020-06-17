<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index () {
        $cates = Category::all();
        $data = compact('cates');
        return view('client.layouts.master', $data);
    }
}
