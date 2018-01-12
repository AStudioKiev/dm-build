<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Request;

use App\Banner;

class BannersController extends Controller
{
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
        Banner::create(Request::all());
        return redirect('admin/banners');
    }

    public function editIndex($id)
    {
        $banner = Banner::find($id);
        return view('admin.banner.edit', compact('banner'));
    }

    public function edit($id)
    {
        $banner = Banner::find($id);

        $banner->name = Request::get('name');
        $banner->image = Request::get('image');
        $banner->isActive = Request::get('isActive');

        $banner->update();

        return redirect('admin/banners');
    }

    public function basket()
    {
        $banners = Banner::onlyTrashed()->get();
        return view('admin.banner.basket', compact('banners'));
    }

    public function basketDelete()
    {
        $banner = Banner::onlyTrashed()->find(Request::get('data_id'));
        return strval($banner->forceDelete());
    }

    public function basketRecover()
    {
        $banner = Banner::onlyTrashed()->find(Request::get('date_id'));
        return strval($banner->restore());
    }

    public function basketClear()
    {
        return strval(Banner::onlyTrashed()->forceDeelete());
    }
}
