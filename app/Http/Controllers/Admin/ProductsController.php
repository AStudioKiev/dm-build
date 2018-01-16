<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Product;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function addIndex()
    {
        return view('admin.products.add');
    }

    public function add()
    {
        Product::create(Request::all());
        return redirect('admin/products');
    }

    public function editIndex($id)
    {
        $product = Product::find($id);
        return view('admin.products.edit', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::find($id);

        $product->name = Request::get('name');
        $product->image = Request::get('image');
        $product->description = Request::get('description');
        $product->colors = Request::get('colors');
        $product->type = Request::get('type');
        $product->subtype = Request::get('subtype');
        $product->code = Request::get('code');
        $product->price = Request::get('price');

        $product->update();

        return redirect('admin/products');
    }

    public function basket()
    {
        $products = Product::onlyTrashed()->get();
        return view('admin.banner.basket', compact('products'));
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
        $products = Poster::onlyTrashed()->get();

        foreach ($products as $product)
        {
            unlink(public_path() . $product->image);
            $product->forceDelete();
        }

        return strval(true);
    }
}
