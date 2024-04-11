<?php

namespace App\Controllers;

class CartController extends BaseController
{
    public function index()
    {
        return view('cart/cart.php');
    }
}
