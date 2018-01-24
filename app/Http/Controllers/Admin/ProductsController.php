<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Request;

use App\Product;
use App\Type;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10, ['id', 'code', 'name', 'image']);
        return view('admin.products.index', compact('products'));
    }

    public function addIndex()
    {
        $parentTypes = Type::whereNull('parent_id')->get(['id', 'name']);
        return view('admin.products.add', compact('parentTypes'));
    }

    public function add()
    {
        $inputs = Request::all();

        if(Request::hasFile('image'))
        {
            do {
                $name = $this->getRandomName();
                $name .= substr($_FILES['image']['name'], strrpos($_FILES['image']['name'], '.'));

            } while(file_exists(public_path() . '/uploads/products/' . $name));

            $file = Request::file('image');
            $file->move(public_path() . '/uploads/products/', $name);
            $inputs['image'] = '/uploads/products/' . $name;
        }

        Product::create($inputs);
        return redirect('admin/products');
    }

    public function editIndex($id)
    {
        $product = Product::find($id);
        $parentTypes = Type::whereNull('parent_id')->get(['id', 'name']);
        $childTypes = Type::where('parent_id', $product->type)->get(['id', 'name']);

        return view('admin.products.edit', compact('product', 'parentTypes', 'childTypes'));
    }

    public function edit($id)
    {
        $product = Product::find($id);

        if(Request::hasFile('image'))
        {
            $pos = strrpos($product->image, '/');
            $path = substr($product->image, 0, $pos);
            $name = substr($product->image, $pos, strlen($product->image));

            $file = Request::file('image');
            $file->move(public_path() . $path, $name);
        }

        $product->name = Request::get('name');
        $product->name_desc = Request::get('name_desc');
        $product->long_description = Request::get('long_description');
        $product->description = Request::get('description');
        $product->short_description = Request::get('short_description');
        $product->video_url = Request::get('video_url');
        $product->type = Request::get('type');
        $product->subtype = Request::get('subtype');
        $product->code = Request::get('code');
        $product->price = Request::get('price');

        $product->update();

        return redirect('admin/products');
    }

    public function delete()
    {
        return Product::destroy(Request::get('data_id'));
    }

    public function basket()
    {
        $products = Product::onlyTrashed()->paginate(10, ['id', 'code', 'name', 'image']);
        return view('admin.products.basket', compact('products'));
    }

    public function basketDelete()
    {
        $product = Product::onlyTrashed()->find(Request::get('data_id'));

        unlink(public_path() . $product->image);

        return strval($product->forceDelete());
    }

    public function basketRecover()
    {
        $product = Product::onlyTrashed()->find(Request::get('data_id'));
        return strval($product->restore());
    }

    public function basketClear()
    {
        $products = Product::onlyTrashed()->get();

        foreach ($products as $product)
        {
            unlink(public_path() . $product->image);
            $product->forceDelete();
        }

        return strval(true);
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
