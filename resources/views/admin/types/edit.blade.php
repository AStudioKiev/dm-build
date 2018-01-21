@extends('layouts.admin')

@section('head-end')
    <script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
@stop

@section('body')
    <h2 class="header-float-top">Админ панель</h2>
    <div class="form-holder">
        <form method="post" id="insideForm" class="form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="select-wrapper">
                <div class="select form-group mar-tp-1 mar-bt-2">
                    <label for="name">Название</label>
                    <input type="text" name="name" value="{{$type->name}}" required class="form-control input-field">
                </div>
                <div class="select form-group mar-tp-1 mar-bt-2">
                    <label for="country">Страна производитель</label>
                    <input type="text" name="country" value="{{$type->country}}" class="form-control input-field">
                </div>
                <div class="select-wrapper image-upload-form">
                    <div class="image-load-holder">
                        <img width="100%" height="100%" src="{{ asset($type->image) }}">
                    </div>
                    <div class="select form-group upload-holder">
                        <label for="image">Изображение</label>
                        <div class="upload-fictive"><span>Choose a file</span></div>
                        <!-- 5MB limit -->
                        <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                        <input type="file" name="image" class="form-control upload-file">
                        <span class="not-found-label">File is not found</span>
                    </div>
                </div>
                <div class="select-wrapper image-upload-form">
                    <div class="image-load-holder">
                        <img width="100%" height="100%" src="{{ asset($type->label) }}">
                    </div>
                    <div class="select form-group upload-holder">
                        <label for="label">Логотип</label>
                        <div class="upload-fictive"><span>Choose a file</span></div>
                        <!-- 5MB limit -->
                        <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                        <input type="file" name="label" class="form-control upload-file">
                        <span class="not-found-label">File is not found</span>
                    </div>
                </div>
                <div class="select-wrapper image-upload-form">
                    <div class="select form-group upload-holder">
                        <label for="price_list">Прайс-лист@if($type->price_list != null)(до 50 MB)(Загружен) @endif</label>
                        <div class="upload-fictive"><span>Choose a file</span></div>
                        <!-- 50MB limit -->
                        <input type="hidden" name="MAX_FILE_SIZE" value="50000000" />
                        <input type="file" name="price_list" class="form-control upload-file">
                        <span class="not-found-label">File is not found</span>
                    </div>
                </div>
                <div class="select form-group mar-tp-1 mar-bt-2">
                    <label for="short_description">Короткое описание</label>
                    <textarea id="short_description" name="short_description" class="textarea-field">
                        {{$type->short_description}}
                    </textarea>
                </div>
                <div class="select form-group mar-tp-1 mar-bt-2">
                    <label for="description">Описание</label>
                    <textarea id="description" rows="3" name="description" class="textarea-field">
                        {{$type->description}}
                    </textarea>
                </div>
                <div class="select form-group mar-tp-1 mar-bt-2">
                    <label for="long_description">Длинное описание</label>
                    <textarea id="long_description" name="long_description" class="textarea-field">
                        {{$type->long_description}}
                    </textarea>
                </div>
            </div>

            <input type="submit" value="Редактировать">
        </form>
    </div>
@stop

@section('js-section')

<script>
    CKEDITOR.replace('short_description');
    CKEDITOR.replace('description');
    CKEDITOR.replace('long_description');
</script>

@stop
