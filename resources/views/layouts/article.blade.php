<!doctype html>
<html lang="zh_CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('html/layout.css')}}">
    <style>
        .model-search {
            position: fixed;
            z-index: 4;
            width: 60%;
            top: 15%;
            left: 20%;
            background-color: white;
            border-radius: 4px;
            display: none;
        }

        .model-parent {
            box-sizing: border-box;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 3;
            width: 100%;
            height: 100%;
            background-color: black;
            opacity: 0.6;
            display: none;
        }

        .model-head {
            font-size: 20px;
            padding: 5px 10px;
            border-bottom: 1px solid black;
            background-color: #f5f5f5;
        }

        .model-head input {
            outline: none;
            border: none;
            height: 100%;
            width: 50%;
            margin: 4px;
            background-color: #f5f5f5;
        }

        .model-head a {
            float: right;
        }

        .model-body {
            height: 400px;
            padding: 15px 30px;
            overflow: auto;
        }

        .model-mes {
            padding: 0;
        }

        .model-list {
            padding: 8px 0 2px 0;
            border-bottom: 1px dashed #ccc;
            cursor: pointer;
        }

        .model-list:hover {
            border-bottom: 1px dashed #222;
        }

        .media-a {
            display: none;
        }

        #find-mes {
            display: none;
        }
        .menu-parent{
            position: fixed;
            left:0;
            top: 0;
            width: 100%;
        }
        .menu-click1 {
            margin-left: 5%;
            width: 40px;
            font-size: 18px;
            background-color: gainsboro;
            padding: 0 11px;
        }

        .menu {
            width: 100%;
            height: 50px;
            display: none;
            background-color: #262a30;
        }
        .menu-click2{
            display: none;
        }
        .auth-div-left{
            display: none;
        }
        .up-menu nav div{
            float: left;
            height: 100%;
            text-align: center;
            line-height: 3.3;
            margin: 0 10px;
        }
        .up-menu nav::after{
            clear: both;
        }
        @media only screen and (max-width: 768px) {
            /* For mobile phones: */
            main{
                position: absolute;
                width: 100%;
            }
            [class*="col-"] {
                width: 100%;
                position: static;
            }

            .auth-div, .hidden {
                display: none;
            }

            .media-a {
                position: absolute;
                display: inline-block;
                float: left;
                font-size: 25px;
                left: 20px;
            }

            .media-a:visited, .media-a:hover {
                color: #777;
            }

            .nav-div {
                display: none;
                font-size: 14px;
                padding: 15px;
            }

            .right-div {
                margin: 0 auto;
            }

            .media-span {
                display: none;
            }

            .model-search {
                width: 80%;
                left: 10%;
            }
            .menu-parent{
                position: fixed;
                height: 100%;
                display: none;
            }
            .menu-parent::after{
                clear: both;
            }
            .menu{
                height: 100%;
                width: 50%;
                display: block;
                margin-left: -50%;
                background-color: #262a30;
                float: left;
            }
            .left_click{
                height: 100%;
                width: 50%;
                display: block;
                margin-left: -50%;
                opacity: 0;
                float: left;
            }
            .menu-click1{
                display: none;
            }
            .menu-click2{
                display: block;
                position: absolute;
                width: 20px;
                height: 40px;
                font-size: 20px;
                top:10px;
                left: 20px;
            }
            .menu-click2>a:visited, .menu-click2>a:hover{
                color: #777;
            }
            .auth-div-left{
                display: block;
                padding-top: 25%;
                color: white;
            }
            .auth-name{
                color: white;
            }
            .auth-div-left>div>p{
                text-align: center;
            }
            .auth-div-left>nav{
                padding-left: 5%;
                height: auto;
                background-color: #262a30;
            }
            .rss{
                text-align: center;
            }
            .about{
                text-align: center;
            }
            nav{
                text-align: center;
                height: auto;
                background: inherit;
            }
            .up-menu nav div{
                float: none;
            }
        }
    </style>
    @yield('other_css')
    <title>树先生の博客</title>
</head>
<body>
<main class="row">
    <div class="col-2 left-div">
        <div class="log-div">
            <div>
                <h2>HUJIE'S BLOG</h2>
            </div>
            <div><h4>No BUG,No Get<a href="javascript:void(0);" class="media-a"><i class="fa fa-navicon"></i></a></h4>
            </div>
        </div>
        <div class="nav-div">
            <ul>
                <li><a href="{{url('/')}}"><i class="fa fa-fw fa-home"></i><span class="li-span">首页</span></a></li>
                <li><a href="{{url('/archives')}}"><i class="fa  fa-fw fa-archive"></i><span
                                class="li-span">归档</span></a></li>
                <li><a href="{{url('/tags')}}"><i class="fa  fa-fw fa-tags"></i><span class="li-span">标签</span></a></li>
                <li><a href="javascript:void(0);" id="search"><i class="fa  fa-fw fa-search"></i><span class="li-span">搜索</span></a>
                </li>
            </ul>
        </div>
        <div class="auth-div">
            <div>
                <img src="{{asset('img/yy.jpg')}}" alt="作者" class="img-my">
                <p class="auth-name">Hujie</p>
                <p class="motto">慎独</p>
            </div>
            <nav class="sub row">
                <div class="col-4"><a href="{{url('archives')}}">{{$arr['articles_num']}}</a><br>
                    日志
                </div>
                <div class="col-4"><a href="{{url('cats')}}">{{$arr['cats_num']}}</a><br>
                    分类
                </div>
                <div class="col-4"><a href="{{url('tags')}}">{{$arr['tags_num']}}</a><br>
                    标签
                </div>
            </nav>
            <div class="rss">
                <a href="#">
                    <i class="fa fa-rss">RSS</i>
                </a>
            </div>
            <div class="about row">
                <a href="#" class="col-6"><i class="fa fa-github"></i> GitHub</a>
                <a href="#" class="col-6"><i class="fa fa-google-plus"></i> Google+</a>
            </div>
        </div>
    </div>
    <div class="col-2 col-offset-2 hidden" style="height: 200px"></div>
    <div class="col-6 right-div">
        @yield('main')
        @yield('pagetion')
        <footer class="">
            <a href="#" class="about-me-link">@hujiejeff</a>
        </footer>
    </div>
</main>
<div class="back-to-top">
    <i class="fa fa-arrow-up"></i>
</div>
<div class="model-search">
    <div class="model-head row">
        <i class="fa fa-search"></i>
        <input type="text" name="key" placeholder="搜索" id="search-article">
        <a href="javascript:void(0)" id="close-model"> <i class="fa fa-close"></i></a>
    </div>
    <div class="model-body">
        <div class="model-mes">
            <div id="find"></div>
            <div id="find-mes">
                <span id="search-length"></span>条相关条目，使用了 <span id="search-time"></span> 毫秒
            </div>
        </div>
        {{--<a href="#"><div class="model-list">车站</div></a>--}}
    </div>
</div>
<div class="model-parent"></div>
<div class="menu-parent">
    <div class="menu">
        <div class="auth-div-left">
            <div>
                <img src="{{asset('img/yy.jpg')}}" alt="作者" class="img-my">
                <p class="auth-name">Hujie</p>
                <p class="motto">慎独</p>
            </div>
            <nav class="sub row">
                <div class="col-4"><a href="{{url('archives')}}">日志{{$arr['articles_num']}}</a>

                </div>
                <div class="col-4"><a href="{{url('cats')}}">分类{{$arr['cats_num']}}</a>

                </div>
                <div class="col-4"><a href="{{url('tags')}}">标签{{$arr['tags_num']}}</a>

                </div>
            </nav>
            <div class="rss">
                <a href="#">
                    <i class="fa fa-rss">RSS</i>
                </a>
            </div>
            <div class="about row">
                <a href="#" class="col-6"><i class="fa fa-github"></i> GitHub</a>
                <a href="#" class="col-6"><i class="fa fa-google-plus"></i> Google+</a>
            </div>
        </div>
        <div class="up-menu">
            <nav>
                <div><a href="{{url('/')}}">博客</a></div>
                <div><a href="#">相册</a></div>
                <div><a href="#">实验室</a></div>
                <div><a href="#">留言板</a></div>
                <div><a href="{{route('chat')}}">聊天室</a></div>
                <div><a href="#">实验室</a></div>
                <div><a href="#">留言板</a></div>
                <div><a href="#">联系我</a></div>
            </nav>
        </div>
    </div>
    <div class="left_click"></div>
    <div class="menu-click1">
        <a href="javascript:void(0);" id="open-menu1"><i class="fa fa-chevron-down"></i></a>
    </div>
</div>
<div class="menu-click2">
    <a href="javascript:void(0);" id="open-menu2" flag="1"><i class="fa fa-long-arrow-right"></i></a>
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script>
    $(window).scroll(function () {
        var scrollTo = $(window).scrollTop(),
            docHeight = $(document).height(),
            windowHeight = $(window).height();
        scrollPercent = (scrollTo / (docHeight - windowHeight)) * 100;
        scrollPercent = scrollPercent.toFixed();
        $('.back-to-top i').text(' ' + scrollPercent + "%");
        if (scrollPercent < 2 || isNaN(scrollPercent)) {
            $('.back-to-top').fadeOut(1000);
        } else {
            $('.back-to-top').fadeIn(1000);
        }
    }).trigger('scroll');

    $(".back-to-top").click(function () {
        $('body,html').animate({scrollTop: 0}, 500);
    });
    $('#search').click(function () {
        $('.model-search').fadeIn(10);
        $('.model-parent').fadeIn(10);
        $(document.body).css('overflow', 'hidden');
    });
    $('#close-model').click(function () {
        $('.model-search').fadeOut(10);
        $('.model-parent').fadeOut(10);
        $(document.body).css('overflow', 'auto');
    });
    $('.media-a').click(function () {
        $('.nav-div').slideToggle(500);
    });
    $('#search-article').bind('input', function () {
        $.get('{{route('search')}}?key_word=' + $(this).val(), function (data, status) {
            if (status == 'success' && data.length > 0) {
                $('.a-search').remove();
                $('#find-mes').show();
                $('#search-length').text(data.length);
                $('#search-time').text(data.time.toFixed(1));
                for (var i = 0; i < data.length; i++) {
                    $('#find-mes').append('<a href="{{url('article')}}/' + data[i]['id'] + '" class="a-search"><div class="model-list">' + data[i]['title'] + '</div></a>');
                }
            } else {
                $('.a-search').remove();
                $('#find-mes').hide();
            }
        });
    });
    $('#open-menu1').click(function () {
        $('.menu').slideToggle(300);
    });
    $('#open-menu2').click(function () {
        if($(this).attr('flag') == '1'){
            $('.menu-parent').css('display','block');
            $('.menu').animate({marginLeft:'0'},300);
            $('.left_click').animate({marginLeft:'0'},300);
            $(document.body).css('overflow', 'hidden');
            $('.menu').css('overflow','auto');
            $(this).children().removeClass('fa-long-arrow-right');
            $(this).children().addClass('fa-long-arrow-left');
            $(this).attr('flag','0');
            $(this).css('position','fixed');
            $('main').animate({left:'50%'},300);
        }else{
            $('.menu').animate({marginLeft:'-50%'},300,function () {
                $('.menu-parent').css('display','none');
            });
            $('.left_click').animate({marginLeft:'-50%'},300);
            $(document.body).css('overflow', 'auto');
            $(this).children().removeClass('fa-long-arrow-left');
            $(this).children().addClass('fa-long-arrow-right');
            $(this).attr('flag','1');
            $(this).css('position','absolute');
            $('main').animate({left:'0'},300);
        }
    });
    $('.left_click').click(function () {
        $('.menu').animate({marginLeft:'-50%'},300,function () {
            $('.menu-parent').css('display','none');
        });
        $('.left_click').animate({marginLeft:'-50%'},300);
        $(document.body).css('overflow', 'auto');
        $('#open-menu2').children().removeClass('fa-long-arrow-left');
        $('#open-menu2').children().addClass('fa-long-arrow-right');
        $('#open-menu2').attr('flag','1');
        $('#open-menu2').css('position','absolute');
        $('main').animate({left:'0'},300);
    });
</script>
@yield('other_js')
</body>
</html>