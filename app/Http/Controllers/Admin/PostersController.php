<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Request;

use App\Poster;

class PostersController extends Controller
{
    public function index()
    {
        $posters = Poster::all();
        return view('admin.posters.index', compact('posters'));
    }

    public function addIndex()
    {
        return view('admin.posters.add');
    }

    public function add()
    {
        $inputs = Request::all();

        if(Request::hasFile('image'))
        {
            do {
                $name = $this->getRandomName();
                $name .= substr($_FILES['image']['name'], strrpos($_FILES['image']['name'], '.'));

            } while(file_exists(public_path() . '/uploads/banners/' . $name));

            $file = Request::file('image');
            $file->move(public_path() . '/uploads/banners/', $name);
            $inputs['image'] = '/uploads/banners/' . $name;
        }

        Poster::create($inputs);
        return redirect('/admin/posters');
    }

    public function editIndex($id)
    {
        $poster = Poster::find($id);
        return view('admin.posters.edit', compact('poster'));
    }

    public function edit($id)
    {
        $poster = Poster::find($id);

        if(Request::hasFile('image'))
        {
            $pos = strrpos($poster->image, '/');
            $path = substr($poster->image, 0, $pos);
            $name = substr($poster->image, $pos, strlen($poster->image));

            $file = Request::file('image');
            $file->move(public_path() . $path, $name);
        }

        $poster->name = Request::get('name');

        $poster->update();

        return redirect('admin/posters');
    }

    public function delete()
    {
        return Poster::destroy(Request::get('data_id'));
    }

    public function activate()
    {
        DB::transaction(function() {
            DB::table('posters')->where('isActive', '1')->update(['isActive' => '0']);
            DB::table('posters')->where('id', Request::get('data_id'))->update(['isActive' => '1']);
        });
    }

    public function basket()
    {
        $posters = Poster::onlyTrashed()->get();
        return view('admin.posters.basket', compact('posters'));
    }

    public function basketDelete()
    {
        $poster = Poster::onlyTrashed()->find(Request::get('data_id'));
        return strval($poster->forceDelete());
    }

    public function basketRecover()
    {
        $poster = Poster::onlyTrashed()->find(Request::get('data_id'));
        return strval($poster->restore());
    }

    public function basketClear()
    {
        $posters = Poster::onlyTrashed()->get();

        foreach ($posters as $poster)
            $poster->forceDelete();

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
