@extends('layouts.article')
@section('other_css')
    <style>
        .tags{
            text-align: left;
        }
        .tag-a{
            display: inline-block;
            margin: 5px;
            padding: 5px;
        }
    </style>
@endsection
@section('main')
        <div class="tags">
            @foreach($tags as $tag)
                @php
                    $count = $tag->articles->count();
                    $size = 14+$count/5;
                    $r = rand(0,255);
                    $g = rand(0,255);
                    $b = rand(0,255);
                @endphp
                <a href="{{url('tag/'.$tag->id)}}" class="tag-a" style="
                        font-size: {{$size}}px;color: rgb({{$r . ',' .$g . ','. $b}})">{{$tag->name}}</a>
            @endforeach
        </div>
@endsection