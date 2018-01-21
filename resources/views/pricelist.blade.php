@extends('layouts.main')

@section('body')

<div class="pricelist-container">
    <div class="row">
        <div class="left-nav col-md-2">
            <ul id="accordion" class="category-list panel-group">
                @foreach($parent_types as $parent_type)
                    <li class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a href="{{url('/pricelist', $parent_type->id)}}">
                                    {{$parent_type->name}}
                                </a>
                            </h4>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="right-container pricelist-info-container col-md-10">
            <div class="pricelist-header space-btw">
                @if($type->label != null)
                    <div class="pricelist-header-img">
                        <img src="{{asset($type->label)}}" width="100%">
                    </div>
                @endif
                <div class="pricelist-header-info">
                    {!!$type->short_description!!}
                    {{$type->country}}
                </div>
            </div>
            <div class="pricelist-text">
                <span>{!!$type->long_description!!}</span>
            </div>

            <div class="mar-tp-4" align="center">
                <input type="submit" role="button" class="orange-btn" value="Открыть прайс-лист">
            </div>
        </div>
    </div>
</div>

@stop
