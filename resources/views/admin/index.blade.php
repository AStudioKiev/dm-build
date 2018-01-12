@extends('layouts.admin')

@section('body')
    <h2 class="header-float-top">Админ панель</h2>

    <div class="admin-holder table-responsive">
        <a href="{{url('admin/products')}}">
            <button id="blogBtn" name="add-new-btn" class="add-new-btn">Управление товарами</button>
        </a>
        <a href="{{url('admin/types')}}">
            <button id="blogBtn" name="add-new-btn" class="add-new-btn">Управление типами товаров</button>
        </a>
        <a href="{{url('admin/banners')}}">
            <button id="blogBtn" name="add-new-btn" class="add-new-btn">Управление банерами</button>
        </a>
    </div>
@stop
