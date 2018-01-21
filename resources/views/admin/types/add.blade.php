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
                    <input type="text" name="name" required class="form-control input-field">
                </div>
                <div class="select form-group mar-tp-1 mar-bt-2">
                    <label for="country">Страна производитель</label>
                    <input type="text" name="country" class="form-control input-field">
                </div>
                <div class="select-wrapper image-upload-form">
                    <div class="select form-group upload-holder">
                        <label for="image">Изображение</label>
                        <div class="upload-fictive"><span>Choose a file</span></div>
                        <!-- 5MB limit -->
                        <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                        <input type="file" name="image" required class="form-control upload-file">
                        <span class="not-found-label">File is not found</span>
                    </div>
                </div>
                <div class="select-wrapper image-upload-form">
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
                        <label for="price_list">Прайс-лист(до 50 MB)</label>
                        <div class="upload-fictive"><span>Choose a file</span></div>
                        <!-- 50MB limit -->
                        <input type="hidden" name="MAX_FILE_SIZE" value="50000000" />
                        <input type="file" name="price_list" class="form-control upload-file">
                        <span class="not-found-label">File is not found</span>
                    </div>
                </div>
                <div class="select form-group mar-tp-1 mar-bt-2">
                    <label for="short_description">Короткое описание</label>
                    <textarea id="short_description" name="short_description" class="textarea-field"></textarea>
                </div>
                <div class="select form-group mar-tp-1 mar-bt-2">
                    <label for="description">Описание</label>
                    <textarea id="description" name="description" class="textarea-field"></textarea>
                </div>
                <div class="select form-group mar-tp-1 mar-bt-2">
                    <label for="long_description">Длинное описание</label>
                    <textarea id="long_description" name="long_description" class="textarea-field"></textarea>
                </div>
            </div>

            <input type="submit" value="Создать">
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
