<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;

use App\Poster;
use App\Type;

class MainController extends Controller
{
    public function index()
    {
        $basketCount = $this->getBasketCount();
        $posters = Poster::take(10)->get();
        $types = Type::whereNull('parent_id')->get();

        return view('index', compact('posters', 'types', 'basketCount'));
    }

    public function pricelist()
    {
        $basketCount = $this->getBasketCount();
        $parent_types = Type::whereNull('parent_id')->get();

        $child_types = [];
        foreach ($parent_types as $parent_type)
        {
            $child_types[$parent_type->id] = Type::where('parent_id', $parent_type->id)->get();
        }

        return view('pricelist', compact('parent_types', 'child_types', 'basketCount'));
    }

    public function basket()
    {
        $basketCount = $this->getBasketCount();
        return view('basket', compact('basketCount'));
    }

    public function mail()
    {
        $name = Request::get('name');
        $phone = Request::get('phone');
    }

    public function dillerMail()
    {
        $fio = Request::get('fio');
        $company = Request::get('company');
        $address = Request::get('address');
        $phone = Request::get('phone');
        $email = Request::get('email');
    }

    public function contacts()
    {
        $basketCount = $this->getBasketCount();
        return view('contacts', compact('basketCount'));
    }

    public function delivery()
    {
        $basketCount = $this->getBasketCount();
        return view('delivery', compact('basketCount'));
    }

    public function diller()
    {
        $basketCount = $this->getBasketCount();
        return view('diller', compact('basketCount'));
    }

    public function aboutus()
    {
        $basketCount = $this->getBasketCount();
        return view('aboutus', compact('basketCount'));
    }

    public function getSubtypes()
    {
        return Type::where('parent_id', Request::get('type'))->get();
    }

    private function getBasketCount()
    {
        $basketCount = 0;
        $basket_products = Request::cookie('basket_products');

        if(!empty($basket_products))
        {
            $basket_products = explode('_', $basket_products);

            foreach ($basket_products as $basket_product)
                $basketCount += explode('-', $basket_product)[0];
        }

        return $basketCount;
    }
}
