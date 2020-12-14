<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{

    /**
     * 
     * show a view with list of products that can be bought
     */
    public function index()
    {
        $products = Product::all();
        return view("home.index", compact('products'));
    }

}
