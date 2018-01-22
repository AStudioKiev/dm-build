<?php

namespace App\Http\Controllers;

use Request;

use App\Type;
use App\Product;

class FiltersController extends Controller
{
    public function index()
    {
        $basketCount = $this->getBasketCount();
        $types = Type::whereNull('parent_id')->get(['id', 'name', 'image', 'description']);
        return view('type_catalog', compact('types', 'basketCount'));
    }

    public function getTypeIndex($type)
    {
        $basketCount = $this->getBasketCount();
        $products = Product::where('type', $type)->paginate(15, ['id', 'name',
        'name_desc', 'image', 'short_description', 'type', 'subtype']);
        $parent_types = Type::whereNull('parent_id')->get(['id', 'name']);

        $child_types = [];
        foreach ($parent_types as $parent_type)
        {
            $child_types[$parent_type->id] = Type::where('parent_id', $parent_type->id)->get(['id', 'name']);
        }

        return view('full_catalog', compact('products', 'parent_types', 'child_types', 'type', 'basketCount'));
    }

    public function getSubtypeIndex($type, $subtype)
    {
        $basketCount = $this->getBasketCount();
        $products = Product::where('subtype', $subtype)->paginate(15, ['id', 'name',
        'name_desc', 'image', 'short_description', 'type', 'subtype']);
        $parent_types = Type::whereNull('parent_id')->get(['id', 'name']);

        $child_types = [];
        foreach ($parent_types as $parent_type)
        {
            $child_types[$parent_type->id] = Type::where('parent_id', $parent_type->id)->get(['id', 'name']);
        }

        return view('full_catalog', compact('products', 'parent_types', 'child_types', 'type', 'basketCount'));
    }

    public function getProductIndex($type, $subtype, $product_id)
    {
        $basketCount = $this->getBasketCount();
        $product = Product::find($product_id);
        $parent_types = Type::whereNull('parent_id')->get(['id', 'name']);

        $child_types = [];
        foreach ($parent_types as $parent_type)
        {
            $child_types[$parent_type->id] = Type::where('parent_id', $parent_type->id)->get(['id', 'name']);
        }

        $product->type = Type::find($type);
        $product->subtype = Type::find($subtype);

        return view('cart', compact('product', 'parent_types', 'child_types', 'type', 'basketCount'));
    }

    public function basket()
    {
        $products = [];
        $basket = $this->takeApart();
        $basketCount = $this->getBasketCount();

        foreach ($basket as $key => $value)
            $products[] = Product::find($key);

        return view('basket', compact('products', 'basket', 'basketCount'));
    }

    public function addToCart($product_id)
    {
        if(empty(Request::cookie('basket_products')))
        {
            $cookieVal = $product_id . '-1';
            $cookie = cookie('basket_products', $cookieVal, 60);
            return response($cookieVal, 200)->cookie($cookie);
        }
        else
        {
            $basket = $this->takeApart();

            if(!empty($basket[$product_id]))
                $basket[$product_id]++;
            else
                $basket[$product_id] = 1;

            $cookieVal = $this->putTogether($basket);
            $cookie = cookie('basket_products', $cookieVal, 60);

            return response($cookieVal, 200)->cookie($cookie);
        }
    }

    public function setBasketCookie()
    {
        $id = intval(Request::get('data_id'));
        $count = intval(Request::get('count'));

        $basket = $this->takeApart();

        if($count != 0)
            $basket[$id] = $count;
        else
            unset($basket[$id]);

        $cookieVal = $this->putTogether($basket);
        $cookie = cookie('basket_products', $cookieVal, 60);

        return response($count, 200)->cookie($cookie);
    }

    public function sendOrder()
    {
        $name = trim(strip_tags(Request::get('name')));
        $phone = trim(strip_tags(Request::get('phone')));
        $email = trim(strip_tags(Request::get('email')));

        $basket = $this->takeApart();
        $message = "Вам написал: $name<br/>
        Его телефон: $phone<br/>
        Его email: $email<br/>";

        if(!empty($basket))
        {
            foreach ($basket as $key => $value)
            {
                $product = Product::find($key);
                $message .= $product->name . ' -> ' . $value . 'штук<br/>';
            }

            mail(
                'astudio0711@gmail.com',
                "Письмо с ДМ-СТРОЙ",
                $message,
                "Content-type:text/html;charset=UTF-8"
            );

            return response('sent', 200);
        }
    }

    private function takeApart()
    {
        $basket = [];
        $basket_products = Request::cookie('basket_products');

        if(!empty($basket_products))
        {
            $basket_products = explode('_', $basket_products);

            foreach ($basket_products as $basket_product)
            {
                $product = explode('-', $basket_product);
                $basket[$product[0]] = $product[1];
            }
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
