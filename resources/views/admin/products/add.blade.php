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
                    <label for="name_desc">Под название</label>
                    <input type="text" name="name_desc" class="form-control input-field">
                </div>
                <div class="select form-group mar-tp-1 mar-bt-2">
                    <label for="code">Артикул</label>
                    <input type="text" name="code" class="form-control input-field">
                </div>
                <div class="select form-group mar-tp-1 mar-bt-2">
                    <label for="price">Цена</label>
                    <input type="number" name="price" required class="form-control input-field">
                </div>
                <div class="select form-group mar-tp-1 mar-bt-2">
                    <label for="video_url">Ссылка на видео</label>
                    <input type="text" name="video_url" class="form-control input-field">
                </div>
                <div class="select form-group mar-tp-1 mar-bt-2">
                    <select id="type_select" name="type" class="selectpicker">
                        <option selected disabled>Выберите тип</option>
                        @foreach($parentTypes as $parentType)
                            <option value="{{$parentType->id}}">{{$parentType->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="select form-group mar-tp-1 mar-bt-2">
                    <select id="subtype_select" name="subtype" class="selectpicker">
                        <option selected disabled>Выберите подтип</option>
                        <option value="NULL">Отсутствует</option>
                    </select>
                </div>
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

            <div class="select-wrapper mar-bt-1">
                <label for="short_description">Краткое описание</label>
                <textarea id="short_description" rows="4" required name="short_description" class="textarea-field"></textarea>
            </div>
            <div class="select-wrapper mar-bt-1">
                <label for="description">Описание</label>
                <textarea id="description" rows="8" name="description" class="textarea-field"></textarea>
            </div>
            <div class="select-wrapper mar-bt-1">
                <label for="long_description">Длинное описание</label>
                <textarea id="long_description" rows="12" name="long_description" class="textarea-field"></textarea>
            </div>

            <input type="submit" value="Создать" class="white-btn">
        </form>
    </div>
@stop

@section('js-section')

<script>
    $("#type_select").change(function(){
        var data = {
            type: $(this).val(),
            _token: $("input[name*='_token']").val()
        }

        $.ajax({
            url: "{{url('/getSubtypes')}}",
            type: 'POST',
            data: data,
            error: function (result) {
                console.log('err: ', result);
            },
            success: function (result) {
                $('#subtype_select').empty();
                $('#subtype_select').append('<option selected disabled>Выберите подтип</option>');
                $('#subtype_select').append('<option value="NULL">Отсутствует</option>');
                result.forEach(function(item, i, result) {
                    $('#subtype_select').append('<option value="'+ item.id +'">'+ item.name +'</option>');
                });
            }
        });
    });
</script>

<script>
    CKEDITOR.replace('description');
    CKEDITOR.replace('short_description');
    CKEDITOR.replace('long_description');
</script>

@stop
