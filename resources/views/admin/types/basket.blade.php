@extends('layouts.admin')

@section('body')
    <h2 class="header-float-top">Админ панель</h2>

    <div class="admin-holder table-responsive">
        <table class="table types-table">
            <a href="{{url('admin')}}">
                <button id="mainBtn" name="add-new-btn" class="add-new-btn">Главная</button>
            </a>
            <a href="{{url('admin/types')}}">
                <button id="blogBtn" name="add-new-btn" class="add-new-btn">Управление типами товаров</button>
            </a>
            <button id="clearBtn" data-toggle="modal" data-target="#myModal" name="add-new-btn" class="add-new-btn">Очистить корзину</button>

            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Имя</th>
                <th scope="col">Родительский тип</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody class="table-content">
            {{ csrf_field() }}
            @foreach ($types as $type)
                <tr>
                    <td>{{$type->id}}</td>
                    <td>{{$type->name}}</td>
                    <td>{{$type->parrent_id}}</td>
                    <td class="admin-item green-item recover-item" data-toggle="modal" data-target="#myModal" data-id="{{$type->id}}">Восстановить</td>
                    <td class="admin-item red-item delete-item" data-toggle="modal" data-target="#myModal" data-id="{{$type->id}}">Удалить</td>
                </tr>
            @endforeach
            </tbody>
        </table>
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

        $('.recover-item').on( "click", function() {
            $('.modal-title').text('Восстановить тип?');
            $('#modal-yes').attr("data-id", $(this).attr('data-id'));
            $('#modal-yes').attr('data-action', 'recover');
        });

        $('#clearBtn').on( "click", function() {
            $('.modal-title').text('Очистить корзину?');
            $('#modal-yes').attr("data-id", $(this).attr('data-id'));
            $('#modal-yes').attr('data-action', 'clear');
        });

        $('#modal-yes').on( "click", function() {
            var data = {
                data_id: $(this).attr('data-id'),
                _token: $("input[name*='_token']").val()
            };

            var action = $('#modal-yes').attr('data-action');
            var url = "{{url('admin/types/basket')}}";
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
                    console.log('action - ', action);
                    if(action === 'delete' || action === 'recover'){
                        var el = 'td[data-id=' + data['data_id'] + ']';
                        $(el).parent().remove();
                    } else if (action === 'clear') {
                        $('.table-content').empty();
                    }
                }
            });
        }
    </script>

@stop
