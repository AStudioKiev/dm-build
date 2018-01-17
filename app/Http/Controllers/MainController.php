<?php

namespace App\Http\Controllers;

use Request;

use App\Type;

class MainController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function type_catalog()
    {
        return view('type_catalog');
    }

    public function full_catalog()
    {
        return view('full_catalog');
    }

    public function cart()
    {
        return view('cart');
    }

    public function contacts()
    {
        return view('contacts');
    }

    public function delivery()
    {
        return view('delivery');
    }

    public function diller()
    {
        return view('diller');
    }

    public function pricelist()
    {
        return view('pricelist');
    }

    public function product()
    {
        return view('product');
    }

    public function getSubtypes()
    {
        return Type::where('parent_id', Request::get('type'))->get();
    }
}
