<?php

namespace App\Http\Controllers;

use Request;

use App\Product;
use App\Type;

class FiltersController extends Controller
{
    public function index()
    {
        $types = Type::whereNull('parent_id')->get();
        return view('type_catalog', compact('types'));
    }

    public function getTypeIndex($type)
    {
        $products = Product::where('type', $type)->paginate(15);
        $parent_types = Type::whereNull('parent_id')->get();

        $child_types = [];
        foreach ($parent_types as $parent_type)
        {
            $child_types[$parent_type->id] = Type::where('parent_id', $parent_type->id)->get();
        }

        return view('full_catalog', compact('products', 'parent_types', 'child_types', 'type'));
    }

    public function getSubtypeIndex($type, $subtype)
    {
        $products = Product::where('subtype', $subtype)->paginate(15);
        $parent_types = Type::whereNull('parent_id')->get();

        $child_types = [];
        foreach ($parent_types as $parent_type)
        {
            $child_types[$parent_type->id] = Type::where('parent_id', $parent_type->id)->get();
        }

        return view('full_catalog', compact('products', 'parent_types', 'child_types', 'type'));
    }

    public function getProductIndex($type, $subtype, $product_id)
    {
        $product = Product::find($product_id);
        $parent_types = Type::whereNull('parent_id')->get();

        $child_types = [];
        foreach ($parent_types as $parent_type)
        {
            $child_types[$parent_type->id] = Type::where('parent_id', $parent_type->id)->get();
        }

        $product->type = Type::find($type);
        $product->subtype = Type::find($subtype);

        return view('cart', compact('product', 'parent_types', 'child_types', 'type'));
    }
}
