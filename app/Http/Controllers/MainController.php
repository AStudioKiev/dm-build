<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;

use App\Poster;
use App\Type;

class MainController extends Controller
{
    public function index()
    {
        $posters = Poster::take(10)->get();
        $types = Type::whereNull('parent_id')->get();

        return view('index', compact('posters', 'types'));
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
