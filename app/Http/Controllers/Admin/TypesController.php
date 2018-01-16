<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Request;

use App\Type;

class TypesController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('admin.types.index', compact('types'));
    }

    public function addIndex()
    {
        return view('admin.types.add');
    }

    public function add()
    {
        Type::create(Request::all());
        return redirect('admin/types');
    }

    public function editIndex($id)
    {
        $type = Type::find($id);
        return view('admin.types.edit', compact('type'));
    }

    public function edit($id)
    {
        $type = Type::find($id);

        $type->name = Request::get('name');
        $type->parrent_id = Request::get('parrent_id');

        $type->update();

        return redirect('admin/types');
    }

    public function delete()
    {
        return Type::destroy(Request::get('data_id'));
    }

    public function basket()
    {
        $types = Type::onlyTrashed()->get();
        return view('admin.types.basket', compact('types'));
    }

    public function basketDelete()
    {
        $type = Type::onlyTrashed()->find(Request::get('data_id'));
        return strval($type->forceDelete());
    }

    public function basketRecover()
    {
        $type = Type::onlyTrashed()->find(Request::get('data_id'));
        return strval($type->restore());
    }

    public function basketClear()
    {
        $types = Type::onlyTrashed()->get();

        foreach ($types as $type)
            $type->forceDelete();

        return strval(true);
    }
}
