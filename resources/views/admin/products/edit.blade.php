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
                    <input type="text" name="name" value="{{$product->name}}" required placeholder="Название" class="form-control input-field">
                </div>
                <div class="select form-group mar-tp-1 mar-bt-2">
                    <input type="text" name="code" value="{{$product->code}}" placeholder="Артикул" class="form-control input-field">
                </div>
                <div class="select form-group mar-tp-1 mar-bt-2">
                    <input type="number" name="price" value="{{$product->price}}" required placeholder="Цена" class="form-control input-field">
                </div>
                <div class="select form-group mar-tp-1 mar-bt-2">
                    <select id="type_select" name="type">
                        <option selected disabled>Выберите тип</option>
                        @foreach($parentTypes as $parentType)
                            <option @if($parentType->id == $product->type) selected @endif value="{{$parentType->id}}">{{$parentType->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="select form-group mar-tp-1 mar-bt-2">
                    <select id="subtype_select" name="subtype">
                        <option selected disabled>Выберите подтип</option>
                        <option value="NULL">Отсутствует</option>
                        @foreach($childTypes as $childType)
                            <option @if($childType->id == $product->subtype) selected @endif value="{{$childType->id}}">{{$childType->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="select-wrapper image-upload-form">
                <div class="image-load-holder">
                    <img width="100%" height="100%" src="{{ asset($product->image) }}">
                </div>
                <div class="select form-group upload-holder">
                    <div class="upload-fictive"><span>Choose a file</span></div>
                    <!-- 5MB limit -->
                    <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                    <input type="file" name="image" class="form-control upload-file">
                    <span class="not-found-label">File is not found</span>
                </div>
            </div>

            <div class="select-wrapper mar-bt-1">
                <textarea id="short_description" rows="4" name="short_description" placeholder="Краткое описание" class="textarea-field">
                    {{$product->short_description}}
                </textarea>
            </div>
            <div class="select-wrapper mar-bt-1">
                <textarea id="description" rows="7" name="description" placeholder="Описание" class="textarea-field">
                    {{$product->description}}
                </textarea>
            </div>

            <input type="submit" value="Редактировать">
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
</script>

@stop
