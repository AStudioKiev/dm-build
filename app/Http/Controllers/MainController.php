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

    public function pricelist($id = 0)
    {
        $basketCount = $this->getBasketCount();
        $parent_types = Type::whereNull('parent_id')->get();

        if($id == 0)
            $type = Type::find($parent_types[0]->id);
        else
            $type = Type::find($id);

        return view('pricelist', compact('parent_types', 'type', 'basketCount'));
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

    public function dillerSend()
    {
        $fio = Request::get('fio');
        $company = Request::get('company');
        $address = Request::get('address');
        $phone = Request::get('phone');
        $email = Request::get('email');

        $message = "Вам написал: $fio<br/>
        Его компания: $company<br/>
        Его адрес: $address<br/>
        Его телефон: $phone<br/>
        Его email: $email<br/>";

        mail(
            'astudio0711@gmail.com',
            "Письмо с ДМ-СТРОЙ",
            $message,
            "Content-type:text/html;charset=UTF-8"
        );

        return response('sent', 200);
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
                $basketCount += intval(explode('-', $basket_product)[1]);
        }

        return $basketCount;
    }
}
