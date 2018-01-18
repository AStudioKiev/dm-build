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
                        <div id="collapse{{$i+1}}" class="panel-collapse collapse @if($i == 0) in @endif">
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

        <div class="right-container pricelist-info-container col-md-10">
            <div class="pricelist-header space-btw">
                <div class="pricelist-header-img"><img src="img/price_header.jpg" alt="" width="100%"></div>
                <div class="pricelist-header-info">
                    <p>ЗАВОД ПОЛИМЕРНОЙ ПРОДУКЦИИ</p>
                    <p>Производство проходов кровли</p>
                    <p>Китай</p>
                </div>
            </div>
            <div class="pricelist-text">
                <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut consequat nunc. Pellentesque at libero vel ipsum pharetra fringilla. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi at ipsum in urna varius rhoncus ornare vitae augue. Morbi ut tortor vehicula lacus laoreet ullamcorper id ac massa. Proin in suscipit nulla. Aliquam varius sollicitudin quam et elementum. Praesent ut diam ut nulla efficitur sodales at sit amet mi. Donec in augue lobortis, ultrices urna non, lacinia elit. Pellentesque tellus magna, egestas a</span>
            </div>

            <div class="mar-tp-4" align="center"><input type="submit" role="button" class="orange-btn" value="Открыть прайс-лист"></div>
        </div>
    </div>
</div>

@stop
