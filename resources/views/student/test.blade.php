@extends('layout')

@section('header')
    @parent
    hh
@stop

@section('main')
    {{--1.输出php变量--}}
    <p>{{$name}}</p>
    {{--2.调用php代码--}}
    <p>{{time()}}</p>
    <p>{{date('Y-m-d h:i:s',time())}}</p>
    <p>{{$names or 'default'}}</p>
    {{--3.原样输出--}}
    <p>@{{$name}}</p>
    <p>{!! $name !!}</p>
    {{--4.引入子视图--}}
    @include('student.common',['name' => 'common-hujie'])

    @if($name == 'hujie')
        我是胡杰
    @else
        我不是胡杰
    @endif

    @unless($name == 'hujie')
    我不是hujie
    @endunless

    {{url('orm1')}}
    {{action('StudentController@orm2')}}
    {{--route别名--}}
    {{csrf_field()}}

    @component('components.alert')
        @slot('title')
            hujie
        @endslot
    test
    @endcomponent
@stop