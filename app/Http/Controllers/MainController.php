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

    public function getSubtypes()
    {
        return Type::where('parent_id', Request::get('type'))->get();
    }
}
