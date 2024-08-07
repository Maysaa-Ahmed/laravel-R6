<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Traits\Common;

class ProductController extends Controller
{
    use Common;
    public function index()
    {
        $products = Product::latest()->take(3)->get();
        return view('index', compact('products'));
    }
    public function store(Request $request)
    {

        $data = $request->validate([
            'productTitle' => 'required|string',
            'description' => 'required|string|max:1000',
            'price' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        $data['image'] = $this->uploadFile($request->image, 'assets/images');

        Product::create($data);
        return redirect()->route('products.index');
    }
    public function create()
    {
        return view('add_product');
    }
}
