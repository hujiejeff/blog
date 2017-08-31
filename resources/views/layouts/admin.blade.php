<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>后台管理</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/theme.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link rel="Favicon Icon" href="favicon.ico">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    @yield('css')
</head>
<body>
<div id="wrap">
    @section('navbar')
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container-fluid">
                <div class="logo">
                    <a href="{{route('admin')}}"><img src="{{asset('img/logo.png')}}" alt="Realm Admin Template"></a>
                </div>
                <a class="btn btn-navbar visible-phone" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="top-menu visible-desktop">
                    <ul class="pull-right">
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                        @else
                        <li><a href="javascript:void(0);"
                               onclick="document.getElementById('logout-form').submit();">
                                <i class="icon-off"></i> Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        @endif
                    </ul>
                </div>

                <div class="top-menu visible-phone visible-tablet">
                    <ul class="pull-right">
                        <li><a href="javascript:void(0);" onclick="document.getElementById('logout-form').submit();">
                                <i class="icon-off"></i>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    @show
    <div class="container-fluid">
    @section('container')
        <!-- Side menu -->
        <div class="sidebar-nav nav-collapse collapse">
            <div class="user_side clearfix">
                <img src="{{asset('img/odinn.jpg')}}" alt="Odinn god of Thunder">
                <h5>@unless(Auth::guest())
                    {{ Auth::user()->name }}
                    @endunless
                </h5>
                <a href="#"><i class="icon-cog"></i> Settings</a>
            </div>
            <div class="accordion" id="accordion2">
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle
                        @if($actions && $actions == 'admin')
                        active
                        @endif
                        b_F79999" href="{{route('admin')}}"><i class="icon-bar-chart"></i> <span>分析</span></a>
                    </div>
                </div>
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle
                        @if($actions && $actions == 'article')
                                active
                        @endif
                        b_C1F8A9" href="{{route('article')}}"><i class="icon-file"></i> <span>文章</span></a>
                    </div>
                </div>
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle
                        @if($actions && $actions == 'cat')
                                active
                        @endif
                        b_9FDDF6" href="{{route('cat')}}"><i class="icon-reorder"></i> <span>分类</span></a>
                    </div>
                </div>
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle
                        @if($action && $actions == 'tag')
                                active
                        @endif
                        b_F5C294" href="{{route('tag')}}"><i class="icon-tags"></i> <span>标签</span></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Side menu -->

        <!-- Main window -->
        <div class="main_container" id="dashboard_page">
            <div class="row-fluid">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin')}}">Admin</a> <span class="divider">/</span></li>
                    <li><a href="{{route($actions)}}">{{$actions}}</a> <span class="divider">/</span></li>
                    <li class="active">{{$action or ''}}</li>
                </ul>
                <h2 class="heading">{{$action_name or ''}}</h2>
            </div>
            @yield('main')
        </div>
        <!-- /Main window -->
        @show
    </div><!--/.fluid-container-->
</div><!-- wrap ends-->
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
{{--<script type="text/javascript" src="{{asset('js/jquery-ui.min.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('js/raphael-min.js')}}"></script>--}}
<script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
{{--<script type="text/javascript" src="{{asset('js/sparkline.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('js/morris.min.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('js/jquery.dataTables.min.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('js/jquery.masonry.min.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('js/jquery.imagesloaded.min.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('js/jquery.facybox.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('js/jquery.alertify.min.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('js/jquery.knob.js')}}"></script>--}}
{{--<script type='text/javascript' src="{{asset('js/fullcalendar.min.js')}}"></script>--}}
{{--<script type='text/javascript' src="{{asset('js/jquery.gritter.min.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('js/realm.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('js/jquery.slimscroll.min.js')}}"></script>--}}
@yield('js')
</body>
</html>
