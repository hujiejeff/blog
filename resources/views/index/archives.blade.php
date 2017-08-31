@extends('layouts/article')
@section('other_css')
    <style>
        section{
            padding: 0 5%;
            text-align: left;
            margin-bottom: 10%;
        }
        .archives{
            margin-top: -10px;
            border-left:3px solid #eee;
        }
        .years{
        }
        .articles{
            margin-top: 0;
            border-bottom: 1px dashed #ccc;
            padding-bottom: 5px;
        }
        .articles:hover .circle-sml{
            background-color: black;
            opacity: 1;
        }
        .title{
            margin-left: 10px;
            vertical-align: middle;
        }
    </style>
@endsection
@section('main')
    <section>
        <span class="circle-big"></span>
        <span style="vertical-align: middle">&nbsp;&nbsp;非常好! 目前共计 {{$articles->total()}} 篇日志。 继续努力。</span>
        <div class="archives">
            @for($i = 0;$i<$articles->count();$i++)
            <div class="years">
                <br>
                <br>
                @if($i == 0 || $articles[$i-1] && $articles[$i-1]->getYear()!= $articles[$i]->getYear())
                <span class="circle-mid"></span>
                <span class="year">&nbsp;&nbsp;{{$articles[$i]->getYear()}}</span>
                    <br>
                    <br>
                @endif
                    <div class="articles">
                        <span class="circle-sml"></span>
                        <span class="title"><a href="{{url('/article/'.$articles[$i]['id'])}}">{{date('m-d',$articles[$i]->getAttributes()['created_at'])}}&nbsp;&nbsp;{{$articles[$i]['title']}}</a></span>
                    </div>
            </div>
            @endfor
        </div>
    </section>@endsection
@section('pagetion')
    {{$articles->links()}}
@endsection