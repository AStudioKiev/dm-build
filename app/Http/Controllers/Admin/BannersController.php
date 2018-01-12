<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Request;

use App\Banner;

class BannersController extends Controller
{
    private $banner;

    public function __construct()
    {
        $this->banner = new Banner();
    }

    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner.index', compact('banners'));
    }

    public function addIndex()
    {
        return view('admin.banner.add');
    }

    public function add()
    {
        $banner = new Banner();
        $banner->create(Request::all());
        return redirect('admin/banners');
    }

    public function editIndex($id)
    {
        $banner = $this->banner->find($id);
        return view('admin.banner.edit', compact('banner'));
    }

    public function edit($id)
    {
        $banner = Banner::find($id);

        $banner->name = Request::get('name');
        $banner->image = Request::get('image');
        $banner->isActive = Request::get('isActive');

        $banner->save();
    }

    public function basket()
    {
        return view('admin.banner.basket');
    }

    public function basketClear()
    {
        return null;
    }

    public function basketDelete()
    {
        return null;
    }

    public function basketRecover()
    {
        return null;
    }
}