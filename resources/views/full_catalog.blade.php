@extends('layouts.main')

@section('body')

<div class="catalog-inner-container">
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

        <div class="right-container catalog-list-container col-md-10">
            <div class="space-btw">
                @forelse($products as $product)
                    <div class="product-holder">
                        <div class="brown-border">
                            <a href="{{url('/catalog/' . $product->type . '/' . $product->subtype . '/' . $product->id)}}">
                                <div class="product-name">
                                    <div>
                                        <span>{{$product->name}}</span>
                                        <span>{{$product->name_desc}}</span>
                                    </div>
                                </div>
                                <div class="category-img">
                                    <img src="{{asset($product->image)}}" height="100%">
                                </div>
                            </a>

                            <div class="product-info">
                                <div>
                                    {!!$product->short_description!!}
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <h2>Товаров пока нет</h2>
                @endforelse
                <div class="paginate-links">
                    {!! $products->links(); !!}
                </div>
            </div>
        </div>
    </div>
</div>

@stop
