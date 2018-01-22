@extends('layouts.main')

@section('body')

<div class="catalog-sm-container space-btw mar-tp-8">
    @foreach($types as $type)
        <div class="category-card">
            <div class="brown-border">
                <div class="category-name">
                    <a href="{{url('/catalog', $type->id)}}">
                        <span>{{$type->name}}</span>
                    </a>
                </div>
                <div class="category-img">
                    <a href="{{url('/catalog', $type->id)}}">
                        <img src="{{asset($type->image)}}" height="100%">
                    </a>
                </div>
                <div class="category-info">
                    <span>{!! $type->description !!}</span>
                </div>
            </div>
        </div>
    @endforeach
</div>

@stop
