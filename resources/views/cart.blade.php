@extends('layouts.main')

@section('body')

<div class="pricelist-container">
    <div class="row">
        <div class="left-nav col-md-2">
            <ul id="accordion" class="category-list panel-group">
                @for($i = 0; $i < count($parent_types); $i++)
                    <li class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$i+1}}">
                                    {{$parent_types[$i]->name}}
                                </a>
                            </h4>
                        </div>
                        <div id="collapse{{$i+1}}" class="panel-collapse collapse @if($parent_types[$i]->id == $type) in @endif">
                            <div class="panel-body">
                                <ul class="inner-list">
                                    @foreach($child_types[$parent_types[$i]->id] as $child_type)
                                        <li>
                                            <a href="{{url('/catalog/' . $parent_types[$i]->id . '/' . $child_type->id)}}">
                                                {{$child_type->name}}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </li>
                @endfor
            </ul>
        </div>

        <div class="right-container product-container col-md-10">
            <div class="address-link">
                <span>
                    <a href="{{url('/')}}">
                        Главная
                    </a>
                     /
                    <a href="{{url('/catalog')}}">
                        Каталог
                    </a>
                     /
                    <a href="{{url('/catalog', $product->type->id)}}">
                        {{$product->type->name}}
                    </a>
                     /
                    <a href="{{url('/catalog/' . $product->type->id . '/' . $product->subtype->id)}}">
                        {{$product->subtype->name}}
                    </a>
                     /
                    <a href="{{url('/catalog/' . $product->type->id . '/' . $product->subtype->id . '/' . $product->id)}}">
                        {{$product->name}}
                    </a>
                </span>
            </div>
            <div class="space-btw">
                <div class="product-inner-photo">
                    <img src="{{asset($product->image)}}" width="100%">
                </div>

                <div class="product-inner-info">
                    <div class="product-info-name">
                        <span>{{$product->name}}</span>
                    </div>
                    <div class="product-info-code">
                        <span>K-P-1 зел.</span>
                    </div>

                    <div class="product-table-grid">
                        {!!$product->description!!}
                    </div>

                    <div class="product-btns space-btw">
                        <button class="orange-sm-btn price-holder">
                            {{$product->price}}
                        </button>
                        <button class="orange-sm-btn" data-toggle="modal" data-target="#alertModal">Купить</button>
                        {{ csrf_field() }}
                    </div>
                </div>
            </div>

            <div class="product-description">
                <span>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>

                <div class="description-video">
                    <iframe width="100%" height="312px" src="https://www.youtube.com/embed/4F4qzPbcFiA" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('js-section')

<script>

$('.orange-sm-btn').on('click', function(){
    $.ajax({
        type : 'POST',
        url : "{{url('/addToCart', $product->id)}}",
        data: {_token: $("input[name*='_token']").val()},
        error: function(result){
            console.log('error: ', result);
        },
        success: function(result){
            var count = parseInt($('.cart-count span').text()) + 1;
            $('.cart-count span').text(count);
        }
    });
});


</script>

@stop
