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
        .markdown-body {
            box-sizing: border-box;
            min-width: 200px;
            max-width: 980px;
            margin: 0 auto;
            padding: 18px;
        }

        .markdown-body code{
            background-color: gainsboro;
        }
        .markdown-body pre{
            background-color: rgba(0, 0, 0, 0.82);;
            color: white !important;
        }


        @media (max-width: 767px) {
            .markdown-body {
                padding: 15px;
            }
        }
        .about-me{
            margin-left: 16px;
            padding: 2px 10px;
            text-align: left;
            border-left: 4px solid red;
            font-size: 15px;
        }
        .about-me span{
            font-weight: bold !important;
            margin-right: 4px;
        }
        .about-me p{
            margin: 5px 0;
        }
        .about-me ~ a{
            display: inline-block;
            border-bottom: 1px solid black;
        }
        .pre-next{
            margin:  2%;
            border-top: 1px solid #eee;
            height: 100px;
            padding: 6px 0;
        }
    </style>
@endsection
@php
    $Parsedown = new Parsedown();
@endphp
@section('main')
        <article>
            <header>
                <h1>{{$article['title']}}</h1>
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
                    {!! $Parsedown->text($article['content']) !!}
                </article>
            </div>
            <div class="about-me">
                <p><span>本文作者:</span>hujie</p>
                <p><span>本文链接:</span><a href="{{URL::current()}}">{{URL::current()}}</a></p>
                <p><span>版权声明:</span>转载请注明出处！</p>
            </div>
            @foreach($article->tags as $tag)
            <a href="{{url('tag/'.$tag->id)}}"># {{$tag->name}}</a>
            @endforeach
            <div class="pre-next">
                @if($article->pre())
                <a href="{{url('/article/'.$article->pre()['id'])}}" class="left"><i class="fa fa-chevron-left">&nbsp;</i>{{$article->pre()['title']}}</a>
                @endif
                @if($article->next())
                <a href="{{url('/article/'.$article->next()['id'])}}" class="right">{{$article->next()['title']}}&nbsp;<i class="fa fa-chevron-right"></i></a>
                @endif
            </div>
        </article>
@endsection