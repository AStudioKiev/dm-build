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

    public function basket()
    {
        return view('basket');
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

    public function getSubtypes()
    {
        return Type::where('parent_id', Request::get('type'))->get();
    }
}
