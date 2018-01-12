<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        return view('admin.products.index');
    }

    public function addIndex()
    {
        return view('admin.products.add');
    }

    public function add()
    {
        return null;
    }

    public function editIndex($id)
    {
        return view('admin.products.edit');
    }

    public function edit($id)
    {
        return null;
    }

    public function basket()
    {
        return view('admin.products.basket');
    }

    public function basketClear()
    {
        return null;
    }

    public function basketDelete()
    {
        return null;
    }

    public function basketRecover()
    {
        return null;
    }
}
