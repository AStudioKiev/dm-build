@extends('layouts.admin')

@section('body')
    <h2 class="header-float-top">Админ панель</h2>

    <div class="admin-holder table-responsive">
        <table class="table subtypes-table">
            <a href="{{url('admin')}}">
                <button id="mainBtn" name="add-new-btn" class="add-new-btn">Главная</button>
            </a>
            <a href="{{url('admin/types')}}">
                <button id="blogBtn" name="add-new-btn" class="add-new-btn">Управление типами товаров</button>
            </a>
            <a href="{{url()->current() . '/add'}}">
                <button id="addNewBtn" name="add-new-btn" class="add-new-btn">Добавить новый подтип</button>
            </a>
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Имя</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            {{ csrf_field() }}
            @foreach ($types as $type)
                <tr>
                    <td>{{$type->id}}</td>
                    <td>{{$type->name}}</td>
                    <td class="admin-item green-item edit-item">
                        <a href="{{url('admin/types/subtypes/edit', $type->id)}}">Редактировать</a>
                    </td>
                    <td class="admin-item red-item delete-item" data-toggle="modal" data-target="#myModal" data-id="{{$type->id}}">Удалить</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="paginate-links">
            {!! $types->links(); !!}
        </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog" style="width: 100%; max-width: 250px;">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" data-action="" id="modal-yes">Да</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="modal-no">Нет</button>
                </div>
            </div>

        </div>
    </div>

@stop

@section('js-section')

<script>
    $('.delete-item').on( "click", function() {
        $('.modal-title').text('Удалить тип?');
        $('#modal-yes').attr("data-id", $(this).attr('data-id'));
        $('#modal-yes').attr('data-action', 'delete');
    });

    $('#modal-yes').on( "click", function() {
        var data = {
            data_id: $(this).attr('data-id'),
            _token: $("input[name*='_token']").val()
        };

        var action = $('#modal-yes').attr('data-action');
        var url = "{{url('admin/types')}}";
        url += '/' + action;

        sendPOST(data, url, action);

    });

    function sendPOST(data, url, action)
    {
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            error: function (result) {
                console.log('err: ', result);
            },
            success: function (result) {
                console.log(result);
                if(result === 'childs') {
                    alert('Нельзя удалить тип(существуют зависящие подтипы!)');
                } else if(result === 'products') {
                    alert('Нельзя удалить тип(существуют зависящие товары!)');
                } else if(action === 'delete') {
                    var el = 'td[data-id=' + data['data_id'] + ']';
                    $(el).parent().remove();
                }
            }
        });
    }
</script>

@stop
