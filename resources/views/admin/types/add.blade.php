@extends('layouts.admin')

@section('body')
    <h2 class="header-float-top">Админ панель</h2>
    <div class="form-holder">
        <form method="post" id="insideForm" class="form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="select-wrapper">
                <div class="select form-group mar-tp-1 mar-bt-2">
                    <input type="text" name="name" required placeholder="Название" class="form-control input-field">
                </div>
                <div class="select form-group mar-tp-1 mar-bt-2">
                    <input type="text" name="parrent_id" placeholder="Родитель" class="form-control input-field">
                </div>
            </div>

            <input type="submit" value="Создать">
        </form>
    </div>
@stop
