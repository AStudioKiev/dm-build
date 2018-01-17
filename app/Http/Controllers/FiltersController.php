<?php

namespace App\Http\Controllers;

use Request;

use App\Product;
use App\Type;

class FiltersController extends Controller
{
    public function full_catalog()
    {
        return view('full_catalog');
    }

    public function cart()
    {
        return view('cart');
    }
    public function index()
    {
        return view('type_catalog');
    }

    public function getTypeIndex($type)
    {
        $products = Product::where('type', $type)->get();
    }

    public function getSubtypeIndex($type, $subtype)
    {
        $products = Product::where('type', $type)->where('subtype', $subtype)->get();
    }

    public function getProductIndex($type, $subtype, $product_id)
    {
        $product = Product::find($product_id);
    }
}
