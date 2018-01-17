@extends('layouts.main')

@section('body')

<div class="catalog-sm-container space-btw mar-tp-8">
    @foreach($types as $type)
        <div class="category-card">
            <div class="brown-border">
                <a href="{{url('/catalog', $type->id)}}">
                    <div class="category-name">
                        <span>{{$type->name}}</span>
                    </div>
                    <div class="category-img">
                        <img src="{{asset($type->image)}}" height="100%">
                    </div>
                </a>
                <div class="category-info">
                    <span>{!! $type->description !!}</span>
                </div>
            </div>
        </div>
    @endforeach
</div>

@stop
