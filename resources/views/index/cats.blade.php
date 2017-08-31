@extends('layouts.article')
@section('other_css')
    <style>
        .right-div{
            height: 500px;
        }
        .cat{
            text-align: left;
        }
        .cat a{
            display: inline-block;
            border-bottom: 1px solid black;
            margin: 7px 7px 7px 30px;
            color: #555;
        }
        .cat a:hover{
            color: black;
        }
        .cat span{
            color: #bbb;
        }
    </style>
@endsection
@section('main')
    <h3>目前共有{{$cats->count()}}个分类</h3>
    <div class="cat">
    @foreach($cats as $cat)
            <a href="{{url('cat/'.$cat->id)}}">{{$cat->name}}</a><span>[{{$cat->articles->count()}}]</span>
            <br>
        @endforeach
    </div>
@endsection