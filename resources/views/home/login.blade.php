@extends('layouts.admin')
@section('navbar')
@stop
@section('container')
    <div class="row-fluid">
        <div class="span12">
            <div class="row-fluid">
                <div class="widget container-narrow">
                    <div class="widget-header">
                        <i class="icon-user"></i>
                        <h5>后台登录</h5>
                    </div>
                    <div class="widget-body clearfix" style="padding:25px;">
                        <form action="{{route('login')}}" method="post">
                            {{csrf_field()}}
                            <div class="control-group">
                                <div class="controls">
                                    <input name="email"  value="{{old('email')}}" class="btn-block" type="text" id="inputEmail" placeholder="Email">
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <input name="password" value="{{old('password')}}" class="btn-block" type="password" id="inputPassword" placeholder="Password">
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls clearfix">
                                    <label style="width:auto" class="checkbox pull-left">
                                        <input type="checkbox" name="remember" {{old('remember') or 'checked'}}> 记住我
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn pull-right">登录</button>
                        </form>
                    </div>
                </div>
            </div><!--/row-fluid-->
        </div><!--/span10-->
    </div><!--/row-fluid-->
@stop