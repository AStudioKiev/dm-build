<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Request;

use App\Type;
use App\Product;

class TypesController extends Controller
{
    public function typesIndex()
    {
        $types = Type::whereNull('parent_id')->paginate(10, ['id', 'name', 'image', 'description']);
        return view('admin.types.index', compact('types'));
    }

    public function addTypeIndex()
    {
        return view('admin.types.add');
    }

    public function addType()
    {
        $inputs = Request::all();

        if(Request::hasFile('image'))
        {
            do {
                $name = $this->getRandomName();
                $name .= substr($_FILES['image']['name'], strrpos($_FILES['image']['name'], '.'));

            } while(file_exists(public_path() . '/uploads/types/' . $name));

            $file = Request::file('image');
            $file->move(public_path() . '/uploads/types/', $name);
            $inputs['image'] = '/uploads/types/' . $name;
        }

        if(Request::hasFile('label'))
        {
            do {
                $name = $this->getRandomName();
                $name .= substr($_FILES['label']['name'], strrpos($_FILES['label']['name'], '.'));

            } while(file_exists(public_path() . '/uploads/types/' . $name));

            $file = Request::file('label');
            $file->move(public_path() . '/uploads/types/', $name);
            $inputs['label'] = '/uploads/types/' . $name;
        }

        if(Request::hasFile('price_list'))
        {
            $name = $inputs['name'] . '_price_list';
            $name .= substr($_FILES['price_list']['name'], strrpos($_FILES['price_list']['name'], '.'));

            $file = Request::file('price_list');
            $file->move(public_path() . '/uploads/types/price_list/', $name);
            $inputs['price_list'] = '/uploads/types/price_list/' . $name;
        }

        Type::create($inputs);

        return redirect('admin/types');
    }

    public function editTypeIndex($id)
    {
        $type = Type::find($id);
        return view('admin.types.edit', compact('type'));
    }

    public function editType($id)
    {
        $type = Type::find($id);
        $inputs = Request::all();

        if(Request::hasFile('image'))
        {
            $pos = strrpos($type->image, '/');
            $path = substr($type->image, 0, $pos);
            $name = substr($type->image, $pos, strlen($type->image));

            $file = Request::file('image');
            $file->move(public_path() . $path, $name);
        }

        if(Request::hasFile('label'))
        {
            if(Request::get('label') !== null)
            {
                $pos = strrpos($type->label, '/');
                $path = substr($type->label, 0, $pos);
                $name = substr($type->label, $pos, strlen($type->label));

                $file = Request::file('label');
                $file->move(public_path() . $path, $name);
            }
            else
            {
                do {
                    $name = $this->getRandomName();
                    $name .= substr($_FILES['label']['name'], strrpos($_FILES['label']['name'], '.'));

                } while(file_exists(public_path() . '/uploads/types/' . $name));

                $file = Request::file('label');
                $file->move(public_path() . '/uploads/types/', $name);
                $inputs['label'] = '/uploads/types/' . $name;
            }
        }

        if(Request::hasFile('price_list'))
        {
            if($type->price_list != null)
            {
                $pos = strrpos($type->price_list, '/');
                $path = substr($type->price_list, 0, $pos);
                $name = substr($type->price_list, $pos, strlen($type->price_list));

                $file = Request::file('price_list');
                $file->move(public_path() . $path, $name);
            }
            else
            {
                $name = $inputs['name'] . '_price_list';
                $name .= substr($_FILES['price_list']['name'], strrpos($_FILES['price_list']['name'], '.'));

                $file = Request::file('price_list');
                $file->move(public_path() . '/uploads/types/price_list/', $name);
                $inputs['price_list'] = '/uploads/types/price_list/' . $name;
            }
        }

        $type->update($inputs);

        return redirect('admin/types');
    }

    public function delete()
    {
        $type = Type::find(Request::get('data_id'));
        $childsCount = Type::where('parent_id', $type->id)->count();
        $productsCount = Product::where('type', $type->id)->count();
        $productsCount += Product::where('subtype', $type->id)->count();

        if($childsCount != 0)
            return 'childs';
        else if($productsCount != 0)
            return 'products';
        else
        {
            unlink(public_path() . $type->image);
            unlink(public_path() . $type->label);
            unlink(public_path() . $type->price_list);
            return Type::destroy(Request::get('data_id'));
        }
    }

    public function subtypesIndex($type_id)
    {
        $types = Type::where('parent_id', $type_id)->paginate(10, ['id', 'name']);
        return view('admin.types.subtypes.index', compact('types'));
    }

    public function addSubtypeIndex($type_id)
    {
        return view('admin.types.subtypes.add', compact('type_id'));
    }

    public function addSubtype($type_id)
    {
        Type::create(Request::all());
        return redirect("admin/types/subtypes/$type_id");
    }

    public function editSubtypeIndex($id)
    {
        $type = Type::find($id);
        $parentTypes = Type::whereNull('parent_id')->get(['id', 'name']);

        return view('admin.types.subtypes.edit', compact('type', 'parentTypes'));
    }

    public function editSubtype($id)
    {
        $type = Type::find($id);
        $path = 'admin/types/subtypes/' . $type->parent_id;

        $type->name = Request::get('name');
        $type->parent_id = Request::get('parent_id');

        $type->update();

        return redirect($path);
    }

    private function getRandomName()
    {
        $str = '0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM0123456789';
        $name = '';

        for ($i = 0; $i < 22; $i++)
            $name .= $str[mt_rand(0, 71)];

        return $name;
    }
}
