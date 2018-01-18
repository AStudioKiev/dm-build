@extends('layouts.main')

@section('body')

<div class="cart-container">
    <div class="row">
        <div class="bought-grid col-md-7">
            <h3 class="cart-header">Ваши покупки</h3>
            @foreach($products as $product)
                <div class="bought-panel" data-id="{{$product->id}}">
                    <div class="bought-info">
                        <div class="bought-name">
                            <span>{{$product->name}}</span>
                        </div>

                        <div class="table-inline">
                            <div class="bought-photo"><img src="{{asset($product->image)}}" alt="{{$product->name}}" width="100%"></div>

                            <div class="bought-count-holder">
                                <div class="count-lebel"><span>Количество</span></div>

                                <div class="calc-count">
                                    <div class="minus" data-id="{{$product->id}}">
                                        <span>-</span>
                                    </div>
                                    <div class="counter" data-id="{{$product->id}}">
                                        <span>{{$basket[$product->id]}}</span>
                                    </div>
                                    <div class="plus" data-id="{{$product->id}}">
                                        <span>+</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bought-action">
                        <button class="look-btn">
                            <a href="{{url('/catalog/'.$product->type.'/'.$product->subtype.'/'.$product->id)}}">
                                Просмотреть товар
                            </a>
                        </button>
                        <button class="del-btn" data-id="{{$product->id}}">Убрать из корзины</button>
                    </div>
                </div>
            @endforeach
            {{csrf_field()}}
        </div>

        <div class="col-md-5">
            <form id="cartForm" class="form form-grid">
                <p class="diller-form-header">Заполните форму и мы обязательно с вами свяжемся.</p>

                <div class="select-wrapper">
                    <div class="select form-group mar-bt-2">
                        <input type="text" name="name" required placeholder="Имя" class="form-control input-field">
                    </div>
                </div>
                <div class="select-wrapper">
                    <div class="select form-group mar-bt-2">
                        <input type="text" name="phone" required placeholder="Контактный телефон" class="form-control input-field">
                    </div>
                </div>
                <div class="select-wrapper">
                    <div class="select form-group mar-bt-2">
                        <input type="email" name="email" required placeholder="Адрес электронной почты" class="form-control input-field">
                    </div>
                </div>

                <input type="submit" role="button" class="orange-btn lg-btn" value="Оформить заказ">
            </form>
        </div>
    </div>
</div>

@stop

@section('js-section')

<script>

    $('.plus').on( "click", function() {
        var id = $(this).attr('data-id');
        var counter = '.counter[data-id=' + id + '] span';
        var count = parseInt($(counter).text()) + 1;

        var data = {
            data_id: id,
            count: count,
            _token: $("input[name*='_token']").val()
        }

        $.ajax({
            data: data,
            method: 'POST',
            url: "{{url('/setBasketCookie')}}",
            error: function(result){
                console.log('err: ', result);
            },
            success: function(result){
                $(counter).text(result);
                var allCount = parseInt($('.cart-count span').text()) + 1;
                $('.cart-count span').text(allCount);
            }
        });
    });

    $('.minus').on( "click", function() {
        var id = $(this).attr('data-id');
        var counter = '.counter[data-id=' + id + '] span';
        var count = parseInt($(counter).text()) - 1;

        if(count > 0)
        {
            var data = {
                data_id: id,
                count: count,
                _token: $("input[name*='_token']").val()
            }

            $.ajax({
                data: data,
                method: 'POST',
                url: "{{url('/setBasketCookie')}}",
                error: function(result){
                    console.log('err: ', result);
                },
                success: function(result){
                    $(counter).text(result);
                    var allCount = parseInt($('.cart-count span').text()) - 1;
                    $('.cart-count span').text(allCount);
                }
            });
        }
    });

    $('.del-btn').on( "click", function() {
        var id = $(this).attr('data-id');
        var counter = '.counter[data-id=' + id + '] span';
        var count = parseInt($(counter).text());

        var data = {
            data_id: id,
            count: 0,
            curCount: count,
            _token: $("input[name*='_token']").val()
        }

        $.ajax({
            data: data,
            method: 'POST',
            url: "{{url('/setBasketCookie')}}",
            error: function(result){
                console.log('err: ', result);
            },
            success: function(result){
                $(counter).text(result);
                var allCount = parseInt($('.cart-count span').text()) - data.curCount;
                $('.cart-count span').text(allCount);
                $('.bought-panel[data-id=' + data.data_id + ']').remove();
            }
        });
    });

    $('#cartForm').on('submit', function(event){
        event.preventDefault();

        var data = {
            name: $('input[name=name]').val(),
            phone: $('input[name=phone]').val(),
            email: $('input[name=email]').val(),
            _token: $("input[name*='_token']").val()
        };

        $.ajax({
            data: data,
            method: 'POST',
            url: "{{url('/sendOrder')}}",
            error: function(result){
                console.log('err: ', result);
            },
            success: function(result){
                console.log(result);
            }
        });
    });

</script>

@stop
