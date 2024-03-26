<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function index(){
        $cartItems=Cart::instance('cart')->content();
        return view('cart',['cartItems'=>$cartItems]);
    }
}
