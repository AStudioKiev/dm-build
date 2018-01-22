@extends('layouts.admin')

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
            </div>
            <div class="select-wrapper image-upload-form">
                <div class="select form-group upload-holder">
                    <label for="image">Изображение</label>
                    <div class="upload-fictive"><span>Choose a file</span></div>
                    <!-- 5MB limit -->
                    <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                    <input type="file" name="image" class="form-control upload-file">
                    <span class="not-found-label">File is not found</span>
                </div>
            </div>

            <input type="submit" value="Создать" class="white-btn">
        </form>
    </div>
@stop
