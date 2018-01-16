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

        foreach ($types as $type)
        {
            if($type->parent_id !== null)
            {
                $parentType = Type::find($type->parent_id);
                $type->parent_id = $parentType->name;
            }
        }

        return view('admin.types.index', compact('types'));
    }

    public function addIndex()
    {
        $parentTypes = Type::whereNull('parent_id')->get();
        return view('admin.types.add', compact('parentTypes'));
    }

    public function add()
    {
        if(Request::get('parent_id') !== 'NULL')
            Type::create(Request::all());
        else
            Type::create(['name' => Request::get('name')]);

        return redirect('admin/types');
    }

    public function editIndex($id)
    {
        $type = Type::find($id);
        $parentTypes = Type::whereNull('parent_id')->get();

        return view('admin.types.edit', compact('type', 'parentTypes'));
    }

    public function edit($id)
    {
        $type = Type::find($id);

        $type->name = Request::get('name');
        $type->parent_id = Request::get('parent_id');

        $type->update();

        return redirect('admin/types');
    }

    public function delete()
    {
        $type = Type::find(Request::get('data_id'));
        $childsCount = Type::where('parent_id', $type->id)->count();

        if($childsCount == 0)
            return Type::destroy(Request::get('data_id'));
        else
            return 'parent';
    }
}
