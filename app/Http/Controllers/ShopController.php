<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ShopController extends Controller
{
   
    
    public function index()
    {
        $product = Product::orderBy('created_at', 'DESC')->paginate(4);
        return view('shop', compact('product'));
    }
    public function productDetails($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $rproducts =    Product::where('slug','!=' ,$slug)->inRandomOrder('id')->get()->take(8);
        return view('details', ['product' => $product], ['rproducts' => $rproducts]);
    }
    
}