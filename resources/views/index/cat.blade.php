@extends('layouts/article')
@section('other_css')
    <style>
        section{
            padding: 0 5%;
            text-align: left;
            margin-bottom: 100px;
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
        <span style="vertical-align: middle">&nbsp;&nbsp; 该分类目前共计 {{$articles->total()}} 篇日志。</span>
        <div class="archives">
                <div class="years">
                    <br>
                    <br>
                        <span class="circle-mid"></span>
                        <span class="year">&nbsp;&nbsp;{{$cat_name}}</span>
                    @for($i = 0;$i<$articles->count();$i++)
                        <br>
                        <br>
                    <div class="articles">
                        <span class="circle-sml"></span>
                        <span class="title"><a href="{{url('/article/'.$articles[$i]['id'])}}">{{date('m-d',$articles[$i]->getAttributes()['created_at'])}}&nbsp;&nbsp;{{$articles[$i]['title']}}</a></span>
                    </div>
                    @endfor
                </div>
        </div>
    </section>@endsection
@section('pagetion')
    {{$articles->links()}}
@endsection