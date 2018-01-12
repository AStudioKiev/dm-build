<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TypesController extends Controller
{
    public function index()
    {
        return view('admin.types.index');
    }

    public function addIndex()
    {
        return view('admin.types.add');
    }

    public function add()
    {
        return null;
    }

    public function editIndex($id)
    {
        return view('admin.types.edit');
    }

    public function edit($id)
    {
        return null;
    }

    public function basket()
    {
        return view('admin.types.basket');
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
