@extends('layouts/article')
@section('other_css')
    <link rel="stylesheet" href="{{asset('css/github-markdown.css')}}">
    <style>
        .content-div{
            margin-top: 50px;
            text-align: justify;
            font-size: 14px;
            margin-bottom: 50px;
            color:#555;
        }
        .footer-div{
            margin: 30px auto;
            border-bottom: 1px solid #ccc;
            width: 60px;
            height: 1px;
        }
        .markdown-body {
            box-sizing: border-box;
            min-width: 200px;
            max-width: 980px;
            margin: 0 auto;
            padding: 45px;
        }
        .markdown-body pre{
            background-color: rgba(0, 0, 0, 0.82);;
            color: white;
        }
        .markdown-body code{
            background-color: gainsboro;
        }
        @media (max-width: 767px) {
            .markdown-body {
                padding: 15px;
            }
        }
    </style>
@endsection
@php
    $Parsedown = new Parsedown();
@endphp
@section('main')
    @foreach($articles as $article)
    <article>
        <header>
            <h1><a href="{{url('/article/'.$article['id'])}}">{{$article['title']}}</a></h1>
            <div class="meta">
                    <span>
                        <i class="fa fa-calendar-o"></i><span class="media-span"> 发表于</span> <time title="创建于">{{$article->created_at}}</time>
                    </span>
                <span> <span>|</span> <i class="fa fa-folder-o"></i><span class="media-span"> 分类于</span> {{$article->cat->name}}</span>
                <span class="media-span"> <span>|</span> <i class="fa fa-comment-o"></i></span>
                <span><span>|</span>  <i class="fa fa-eye"></i><span> 浏览次数</span>{{$article->read_num}}</span>
            </div>
        </header>
        <div class="content-div">
            <article class="markdown-body">
            {!! substr($Parsedown->text($article['content']),0,900)!!}
            </article>
        </div>
        <div>
            <a href="{{url('/article/'.$article['id'])}}" class="btn">阅读全文</a>
        </div>
        <div class="footer-div">

        </div>
    </article>
    @endforeach
@endsection
@section('pagetion')
    {{$articles->links()}}
@endsection