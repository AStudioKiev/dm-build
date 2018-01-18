<?php

namespace App\Http\Controllers;

use Request;
use Responce;

use App\Product;
use App\Type;

class FiltersController extends Controller
{
    public function index()
    {
        $basketCount = $this->getBasketCount();
        $types = Type::whereNull('parent_id')->get();
        return view('type_catalog', compact('types', 'basketCount'));
    }

    public function getTypeIndex($type)
    {
        $basketCount = $this->getBasketCount();
        $products = Product::where('type', $type)->paginate(15);
        $parent_types = Type::whereNull('parent_id')->get();

        $child_types = [];
        foreach ($parent_types as $parent_type)
        {
            $child_types[$parent_type->id] = Type::where('parent_id', $parent_type->id)->get();
        }

        return view('full_catalog', compact('products', 'parent_types', 'child_types', 'type', 'basketCount'));
    }

    public function getSubtypeIndex($type, $subtype)
    {
        $basketCount = $this->getBasketCount();
        $products = Product::where('subtype', $subtype)->paginate(15);
        $parent_types = Type::whereNull('parent_id')->get();

        $child_types = [];
        foreach ($parent_types as $parent_type)
        {
            $child_types[$parent_type->id] = Type::where('parent_id', $parent_type->id)->get();
        }

        return view('full_catalog', compact('products', 'parent_types', 'child_types', 'type', 'basketCount'));
    }

    public function getProductIndex($type, $subtype, $product_id)
    {
        $basketCount = $this->getBasketCount();
        $product = Product::find($product_id);
        $parent_types = Type::whereNull('parent_id')->get();

        $child_types = [];
        foreach ($parent_types as $parent_type)
        {
            $child_types[$parent_type->id] = Type::where('parent_id', $parent_type->id)->get();
        }

        $product->type = Type::find($type);
        $product->subtype = Type::find($subtype);

        return view('cart', compact('product', 'parent_types', 'child_types', 'type', 'basketCount'));
    }

    public function addToCart($product_id)
    {
        $basket_products = Request::cookie('basket_products');

        if(empty($basket_products))
        {
            $cookieVal = $product_id . '-1';
            $cookie = cookie('basket_products', $cookieVal, time() + 60*60*3);
            return response($cookieVal, 200)->cookie($cookie);
        }
        else
        {
            $basket = $this->takeApart($basket_products);

            if(!empty($basket[$product_id]))
                $basket[$product_id]++;
            else
                $basket[$product_id] = 1;

            $cookieVal = $this->putTogether($basket);
            $cookie = cookie('basket_products', $cookieVal, time() + 60*60*3);

            return response($cookieVal, 200)->cookie($cookie);
        }
    }

    private function takeApart($basket_products)
    {
        $basket = [];
        $basket_products = explode('_', $basket_products);

        foreach ($basket_products as $basket_product)
        {
            $product = explode('-', $basket_product);
            $basket[$product[0]] = $product[1];
        }

        return $basket;
    }

    private function putTogether($basket)
    {
        $cookieVal = '';

        foreach ($basket as $key => $value)
            $cookieVal .= $key . '-' . $value . '_';

        return substr($cookieVal, 0, strlen($cookieVal) - 1);
    }

    private function getBasketCount()
    {
        $basketCount = 0;
        $basket_products = Request::cookie('basket_products');

        if(!empty($basket_products))
        {
            $basket_products = explode('_', $basket_products);

            foreach ($basket_products as $basket_product)
                $basketCount += intval(explode('-', $basket_product)[1]);
        }

        return $basketCount;
    }
}
