<!doctype html>
<html lang="utf-8">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>聊天室</title>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('html/layout.css')}}">
    <style>
        body {
            background: #D9D9D9;
        }

        nav {
            position: fixed;
            width: 100%;
        }

        nav div {
            float: left;
            height: 100%;
            text-align: center;
            line-height: 3.3;
            margin: 0 10px;
        }

        .user {
            position: fixed;
            right: 0;
            bottom: 0;
            width: 150px;
            height: 60px;
            background-color: white;
            cursor: pointer;
            box-shadow: 0 0 40px #bdbdbd;
        }

        .user img {
            height: 100%;
            margin-left: 10px;
            border-radius: 60px;
        }

        .user span {
            height: 100%;
            display: inline-block;
            font-size: 18px;
            line-height: 2;
            vertical-align: top;
            padding: 15px;
        }

        .chat-min {
            right: 45%;
            bottom: -60px;
        }

        .chat-list {
            position: fixed;
            right: 0;
            bottom: -522px;
            width: 265px;
            height: 522px;
            background-color: white;
            box-shadow: 0 0 40px #bdbdbd;
        }

        .chat-list header {
            padding: 15px;
            font-size: 16px;
            background-color: #f7f7f7;
        }

        .chat-list input {
            border: none;
            padding: 4px 0;
            width: 95%;
            background-color: #f7f7f7;
        }

        .chat-list > main {
            height: 100%;
        }

        #state {
            background-color: white;
            color: #3fdd86;
        }

        .close {
            float: right;
        }

        .flex-parent {
            display: flex;
            cursor: pointer;
            background-color: #f7f7f7;
        }

        .flex-item {
            width: 33.33%;
            font-size: 25px;
            text-align: center;
            color: #636b6f;
            border-bottom: 3px solid #ffffff;
        }

        .flex-item:hover span {
            color: #777;
        }

        .comments {
            margin-top: 10px;
        }

        .friend {
            height: 100%;
            margin-top: 10px;
            display: none;
            overflow-y: auto;
        }

        .friend-group {
            margin-top: 10px;
            display: none;
        }

        .comment div {
            float: left;
        }

        .comment::after {
            clear: both;
        }

        .comment img {
            width: 40px;
            border-radius: 40px;
        }

        .comment {
            display: inline-block;
            height: auto;
            padding: 5px 0;
            cursor: pointer;
            width: 100%;
        }

        .comment:hover {
            background-color: #eee;
        }

        .comment div {
            margin: 0 10px;
        }

        .comment p {
            margin: 0;
            font-size: 15px;
        }

        .comment p:last-child {
            font-size: 10px;
        }

        .chat-windows {
            position: fixed;
            right: 400px;
            width: 802px;
            height: 522px;
            bottom: 0;
            box-shadow: 0 0 40px #bdbdbd;
        }

        .chat-windows::after {
            clear: both;
        }

        .chat-window-toolbar {
            float: left;
            width: 200px;
            height: 522px;
            background-color: #D9D9D9;
        }

        .chat-now {
            height: 50px;
            margin: 5px;
            padding: 4px;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
        }

        .chat-now:hover > div:last-child {
            display: inline-block;
        }

        .chat-now::after {
            clear: both;
        }

        .chat-now > div {
            float: left;
        }

        .chat-now > div > img {
            width: 40px;
            border-radius: 40px;
        }

        .chat-now > div > span {
            margin-left: 10px;
            line-height: 2.5;
            color: black;
            background-color: inherit;
        }

        .chat-now > div:last-child {
            display: none;
            float: right;
            font-size: 18px;
        }

        .chat-now > div:last-child:hover > span {
            color: #c00;
        }

        .chat-window {
            float: left;
            width: calc(100% - 200px);
            height: 100%;
            background-color: white;
        }

        .chat-window header img {
            width: 60px;
            border-radius: 60px;
        }

        .chat-window header {
            height: 80px;
            padding: 10px;
            background-color: #f7f7f7;
        }

        .chat-window-img, .chat-window-name {
            margin: 0 10px;
            height: 100%;
            float: left;
        }

        .chat-window-name span {
            font-size: 20px;
            line-height: 3;
        }

        .chat-window-meta {
            height: 100%;
            float: right;
            font-size: 17px;
            line-height: 3;
        }

        .chat-window-meta span {
            margin: 0 2px;
            cursor: pointer;
        }

        .chat-window-meta span:last-child {
            font-size: 21px;
        }

        .chat-window header::after {
            clear: both;
        }

        .chat-message {
            height: 68px;
        }

        .chat-window > main img {
            width: 40px;
            border-radius: 40px;
        }

        .chat-message > div {
            margin: 0 10px;
            float: left;
        }

        .chat-message::after {
            clear: both;
        }

        .chat-window main {
            padding: 10px;
            border-bottom: 1px solid #F1F1F1;
            height: calc(100% - 240px);
            overflow-y: scroll;
        }

        .chat-message-meta-left {
            color: #999;
            font-size: 12px;
            text-align: left;
        }

        .chat-message-meta-right {
            color: #999;
            font-size: 12px;
            text-align: right;
        }

        .chat-message-desc {
            margin-top: 5px;
            position: relative;
            float: left;
            padding: 8px 15px;
            background-color: #e2e2e2;
            color: #333;
            word-break: break-all;
            border-radius: 4px;
        }

        .chat-message-desc::after {
            content: '';
            position: absolute;
            left: -10px;
            top: 13px;
            width: 0;
            height: 0;
            border-style: solid dashed dashed;
            border-color: #e2e2e2 transparent transparent;
            overflow: hidden;
            border-width: 10px;
        }

        .chat-message-re {
            height: 68px;
        }

        .chat-message-re > div {
            margin: 0 10px;
            float: right;
        }

        .chat-message-re::after {
            clear: both;
        }

        .chat-message-desc-re {
            margin-top: 5px;
            position: relative;
            float: right;
            padding: 8px 15px;
            background-color: #5FB878;
            color: #333;
            word-break: break-all;
            border-radius: 4px;
        }

        .chat-message-desc-re::after {
            content: '';
            position: absolute;
            right: -10px;
            top: 13px;
            width: 0;
            height: 0;
            border-style: solid dashed dashed;
            border-color: #5FB878 transparent transparent;
            overflow: hidden;
            border-width: 10px;
        }

        .chat-window > footer {
            height: 131px;
        }

        .chat-window > footer > div {
            padding: 10px 15px;
            font-size: 18px;
        }

        .chat-menus {
            float: left;
            display: flex;
            font-size: 21px;
        }

        .chat-menu {
            margin: 0 10px;
        }

        .chat-recorder {
            float: right;
        }

        .chat-window > footer::after {
            clear: both;
        }

        .chat-input textarea {
            border: none;
            width: 100%;
            height: 50px;
            resize: none;
        }

        .chat-input textarea:focus {
            outline: none;
            resize: none;
        }

        .chat-send {
            padding: 0;
        }

        .chat-send a {
            float: right;
            background-color: #5FB878;
            color: white;
            padding: 2px 20px;
            font-size: 17px;
            border-radius: 2px;
            margin: 0 3px;
            font-weight: 300;
        }

        .chat-state-mes {
            font-size: xx-small;
            border: 1px solid gainsboro;
            border-radius: 10px;
            width: 170px;
            text-align: center;
            margin: 2px auto;
        }
        .chat-active{
            display: block;
            background-color: #F3F3F3;
        }
        .chat-no-active{
            display: block;
            background-color: #D9D9D9;
        }
        .chat-no-view{
            display: none;
        }
        .chat-no-active:hover{
            background-color: #e2e2e2;
        }
    </style>
</head>
<body>
<main>
</main>
<!-- -->
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
<div class="user me">
    <img src="{{asset('img/yy.jpg')}}" alt="">
    <span class="self">hujie</span>
</div>
<div class="user chat-min">
    <img src="{{asset('img/yy.jpg')}}" alt="">
    <span>hujie</span>
</div>
<div class="chat-list">
    <header>
        <span class="self">hujie</span>
        <span class="fa fa-circle" id="state"></span>
        <span class="close fa fa-close" style="cursor: pointer"></span>
        <input type="text" placeholder="签名">
    </header>
    <div class="flex-parent">
        <div class="flex-item" id="comments" style="border-bottom:3px solid #3fdd86">
            <span class="fa fa-commenting"></span>
        </div>
        <div class="flex-item" id="friend">
            <span class="fa fa-user"></span>
        </div>
        <div class="flex-item" id="friend-group">
            <span class="fa fa-users"></span>
        </div>
    </div>
    <main>
        <div class="comments">
            <div class="comment">
                <div><img src="{{asset('img/ww.jpg')}}" alt=""></div>
                <div>
                    <p>aa</p>
                    <p>慎独</p>
                </div>
            </div>
            <div class="comment">
                <div><img src="{{asset('img/ww.jpg')}}" alt=""></div>
                <div>
                    <p>bb</p>
                    <p>慎独</p>
                </div>
            </div>
        </div>
        <div class="friend">
        </div>
        <div class="friend-group">
            <div class="comment">
                <div><img src="{{asset('img/ww.jpg')}}" alt=""></div>
                <div>
                    <p>群聊</p>
                    <p>没啥好聊的</p>
                </div>
            </div>
        </div>
    </main>
    <footer></footer>
</div>
<div class="chat-windows" style="display: none;">
    <div class="chat-window-toolbar">
        <div class="chat-now" onclick="tab_chat_window(this)" id="common-chat-a">
            <div><img src="{{asset('img/ww.jpg')}}" alt=""></div>
            <div><span>群聊</span></div>
            <div><span class="fa fa-times-circle" onclick="close_now_window(this,event)"></span></div>
        </div>
        {{--<div class="chat-now" id="chat-now-1" onclick="tab_chat_window(this)">--}}
        {{--<div><img src="{{asset('img/ww.jpg')}}" alt=""></div>--}}
        {{--<div><span class="chat-people-name"></span></div>--}}
        {{--<div><span class="fa fa-times-circle"></span></div>--}}
        {{--</div>--}}
    </div>
    <div class="chat-window" id="chat_a" style="display: block;">
        <header>
            <div class="chat-window-img"><img src="{{asset('img/ww.jpg')}}" alt=""></div>
            <div class="chat-window-name"><span>群聊</span></div>
            <div class="chat-window-meta">
                <span class="fa fa-window-minimize" onclick="chat_window_min()"></span>
                <span class="fa fa-window-maximize" onclick="chat_window_max()"></span>
                <span class="fa fa-times" onclick="chat_window_close()"></span>
            </div>
        </header>
        <main>
        </main>
        <footer>
            <div>
                <div class="chat-menus">
                    <div class="chat-menu"><span class="fa fa-smile-o"></span></div>
                    <div class="chat-menu"><span class="fa fa-image"></span></div>
                    <div class="chat-menu"><span class="fa fa-file-o"></span></div>
                </div>
                <div class="chat-recorder">
                    <span class="fa fa-clock-o">  聊天记录</span>
                </div>
            </div>
            <div class="chat-input">
                <textarea autofocus id="msg_box" onkeydown="confirm(event)" placeholder="按回车发送"></textarea>
            </div>
            <div class="chat-send">
                <a href="javascript:void(0);" onclick="send()">发送</a>
                <a href="javascript:void(0);">关闭</a>
            </div>
        </footer>
    </div>
    {{--<div class="chat-window" style="display: none" id="chat_1">--}}
    {{--<header>--}}
    {{--<div class="chat-window-img"><img src="{{asset('img/ww.jpg')}}" alt=""></div>--}}
    {{--<div class="chat-window-name"><span class="chat-people-name"></span></div>--}}
    {{--<div class="chat-window-meta">--}}
    {{--<span class="fa fa-window-minimize"></span>--}}
    {{--<span class="fa fa-window-maximize"></span>--}}
    {{--<span class="fa fa-times"></span>--}}
    {{--</div>--}}
    {{--</header>--}}
    {{--<main>--}}
    {{--</main>--}}
    {{--<footer>--}}
    {{--<div>--}}
    {{--<div class="chat-menus">--}}
    {{--<div class="chat-menu"><span class="fa fa-smile-o"></span></div>--}}
    {{--<div class="chat-menu"><span class="fa fa-image"></span></div>--}}
    {{--<div class="chat-menu"><span class="fa fa-file-o"></span></div>--}}
    {{--</div>--}}
    {{--<div class="chat-recorder">--}}
    {{--<span class="fa fa-clock-o">  聊天记录</span>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="chat-input">--}}
    {{--<textarea autofocus class="msg_box_private" onkeydown="confirm_private(event,this)" placeholder="按回车发送"></textarea>--}}
    {{--</div>--}}
    {{--<div class="chat-send">--}}
    {{--<a href="javascript:void(0);" onclick="send_private(this)">发送</a>--}}
    {{--<a href="javascript:void(0);">关闭</a>--}}
    {{--</div>--}}
    {{--</footer>--}}
    {{--</div>--}}
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script>
    $('.flex-item').each(function () {
        $(this).click(function () {
            let className = $(this).attr('id');
            $('.chat-list main>div').each(function () {
                $(this).css('display', 'none');
            });
            $('.' + className).css('display', 'block');
            $('.flex-item').each(function () {
                $(this).removeAttr('style');
            });
            $(this).css('borderBottom', '3px solid #3fdd86');
        });
    });
    $('.friend-group .comment').click(function () {
        $('#common-chat-a').trigger('click');
        $('#common-chat-a').removeClass('chat-no-view').removeClass('chat-no-active').addClass('chat-active');
    });
    $('.me').click(function () {
        $('.chat-list').animate({bottom: '0'}, 300);
    });
    $('.close').click(function () {
        $('.me').animate({bottom: '0'}, 300);
        $('.chat-list').animate({bottom: '-522px'}, 400);
    });
    //    $('.fa-window-minimize').click(function () {
    //        $('.chat-windows').animate({bottom:'-'+$('.chat-windows').height()+'px'},300,function () {
    //            $('.chat-min').css('bottom','0');
    //            $('.chat-min').show();
    //        });
    //    });
    $('.chat-min').click(function () {
        $('.chat-windows').animate({bottom: '0'}, 300);
    });
    //    $('.fa-window-maximize').toggle(function () {
    //        $('.chat-windows').animate({width:'100%',height:'100%',bottom:'0',right:'0'},300);
    //        $('.chat-window>main').animate({scrollTop:$('.chat-window>main').height()},300);
    //    },function () {
    //        $('.chat-windows').animate({width:'802px',height:'522px',bottom:'0',right:'400px'},300);
    //        $('.chat-window>main').animate({scrollTop:$('.chat-window>main').height()},300);
    //    });
    //    $('.fa-times').click(function () {
    //        $('.chat-windows').hide(200);
    //        $('.chat-min').hide();
    //    });
</script>
</body>
</html>
<script type="text/javascript">
    function chat_window_min() {
        $('.chat-windows').animate({bottom: '-' + $('.chat-windows').height() + 'px'}, 300, function () {
            $('.chat-min').css('bottom', '0');
            $('.chat-min').show();
        });
    }

    function chat_window_max(obj) {
        $('.chat-windows').animate({width: '100%', height: '100%', bottom: '0', right: '0'}, 300);
        $('.chat-window>main').animate({scrollTop: $('.chat-window>main').height()}, 300);
        $(obj).attr('onclick', 'chat_window_remax(this)');
    }

    function chat_window_close() {
        $('.chat-windows').hide(200);
        $('.chat-min').hide();
    }

    function chat_window_remax(obj) {
        $('.chat-windows').animate({width: '802px', height: '522px', bottom: '0', right: '400px'}, 300);
        $('.chat-window>main').animate({scrollTop: $('.chat-window>main').height()}, 300);
        $(obj).attr('onclick', 'chat_window_max(this)');
    }
    function open_chat(obj) {
        var chat_name = $(obj).children('div>p:first').html();
        $('.chat-windows').show();
        $('#chat-now-'+$(obj).attr('id')).show();
        $('#chat-now-'+$(obj).attr('id')).trigger('click');
        $('#chat_' + $(obj).id + '.chat-window-name span').text('chat_name');
    }
    function tab_chat_window(obj) {
//        $('.chat-now').each(function () {
//            $(this).css('backgroundColor', '#D9D9D9');
//            $(this).removeClass('chat_active');
//        });
        $('.chat-windows').show();
        $('.chat-active').removeClass('chat-no-view').removeClass('chat-active').addClass('chat-no-active');
//        $(obj).css('backgroundColor', '#F3F3F3');
        $(obj).removeClass('chat-no-view').removeClass('chat-no-active').addClass('chat-active');
        $('.chat-window').css('display', 'none');
        let chat_now_id = $(obj).attr('id');
        console.log(chat_now_id);
        let num = 'chat_' + chat_now_id.charAt(chat_now_id.length - 1);
        $('#' + num).css('display', 'block');
    }
    function close_now_window(obj,event) {
        var id = $(obj).parents('.chat-now').attr('id');
        var ids = id.charAt(id.length-1);
        var obj_now;
        var obj_window;
        if(ids == 'a'){
            obj_now = $('#common-chat-a');
            obj_window = $('#chat_a');
        }else{
            obj_now = $('#chat-now-'+ids);
            obj_window = $('#chat_'+ids);
        }
        obj_window.hide();
        if(obj_now.hasClass('chat-active')){
            if($('.chat-no-active').length &&$('.chat-no-active').length >0) {
                $('.chat-no-active:first').trigger();
            }else{
                $('.chat-windows').hide();
            }
        }
        obj_now.removeClass('chat-active').removeClass('chat-no-active').addClass('chat-no-view');
        event.stopPropagation();
    }
    // 存储用户名到全局变量,握手成功后发送给服务器
    var uuid;
    var uname = prompt('请输入用户名');
    $('.self').html(uname);
    var ws = new WebSocket("ws://127.0.0.1:8080");
    ws.onopen = function () {
        var data = "系统消息：建立连接成功";
        listMsg(data, 0);
    };

    /**
     * 分析服务器返回信息
     *
     * msg.type : user 普通信息;system 系统信息;handshake 握手信息;login 登陆信息; logout 退出信息;
     * msg.from : 消息来源
     * msg.content: 消息内容
     */
    ws.onmessage = function (e) {
        var msg = JSON.parse(e.data);
        var sender, user_name, name_list, change_type;

        switch (msg.type) {
            case 'system':
                sender = '系统消息: ';
                break;
            case 'user':
                sender = msg.from + ': ';
                break;
            case 'handshake':
                var user_info = {'type': 'login', 'content': uname};
                sendMsg(user_info);
                return;
            case 'login':
            case 'logout':
                user_name = msg.content;
                name_list = msg.user_list;
                change_type = msg.type;
                dealUser(user_name, change_type, name_list);
                return;
        }

        var data = sender + msg.content;
        let chat_content = msg.content;
        console.log(chat_content.indexOf('@'));
        if (chat_content.indexOf('@') >= 0) {
            var name = chat_content.substring(0, chat_content.indexOf('@'));
            let deal_chat = chat_content.substring(chat_content.indexOf('@') + 1);
            privateListMsg(deal_chat, sender.substring(0, sender.length - 2), name);
        } else {
            listMsg(data, msg.type);
        }
    };

    ws.onerror = function () {
        var data = "系统消息 : 出错了,请退出重试.";
        listMsg(data, 'system');
    };

    /**
     * 在输入框内按下回车键时发送消息
     *
     * @param event
     *
     * @returns {boolean}
     */
    function confirm(event) {
        var key_num = event.keyCode;
        if (13 == key_num) {
            send();
        } else {
            return false;
        }
    }
    function confirm_private(event, obj) {
        var key_num = event.keyCode;
        if (13 == key_num) {
            let jj = $(obj).parents('.chat-window').find('.chat-people-name');
            send_private(jj);
        } else {
            return false;
        }
    }
    /**
     * 发送并清空消息输入框内的消息
     */
    function send() {
        var msg_box = document.getElementById("msg_box");
        var content = msg_box.value;
        var reg = new RegExp("\r\n", "g");
        content = content.replace(reg, "");
        var msg = {'content': content.trim(), 'type': 'user'};
        sendMsg(msg);
        msg_box.value = '';
        // todo 清除换行符
    }

    function send_private(obj) {
        var to = $(obj).parents('.chat-window').find('.chat-people-name').text();
        var id = $(obj).parents('.chat-window').attr('id');
        var ids = id.charAt(id.length - 1);
        console.log(ids);
        var msg_box = $(obj).parents('.chat-window').find('.msg_box_private').get(0);
        var content = msg_box.value;
        console.log(content);
        var reg = new RegExp("\r\n", "g");
        content = content.replace(reg, "");
        var msg = {'content': to + '@' + content.trim() + uuid + ids, 'type': 'user'};
        sendMsg(msg);
        msg_box.value = '';
        // todo 清除换行符
    }

    function privateListMsg(data, from, to) {
        console.log(from + "->" + to);
        var chat_message = data.substring(data.indexOf(':') + 1, data.length - 2);
        var from_id = data.charAt(data.length - 2);
        var to_id = data.charAt(data.length - 1);
        var now_time = (new Date()).toLocaleString();
        console.log(data);
        var div_model = `<div class="chat-message">
            <div><img src="{{asset('img/ww.jpg')}}" alt=""></div>
            <div class="chat-message-text">
                <div class="chat-message-meta-left">${from}  ${now_time}</div>
                <div class="chat-message-desc">${chat_message}</div>
            </div>
        </div>`;
        var div_model_self = `        <div class="chat-message-re">
            <div><img src="{{asset('img/ww.jpg')}}" alt=""></div>
            <div class="chat-message-text">
                <div class="chat-message-meta-right">${now_time} ${from}</div>
                <div class="chat-message-desc-re">${chat_message}</div>
            </div>
        </div>`;
        if (from == uname) {
            $('#chat_' + to_id + ' main').append(div_model_self);
        }
        if (to == uname) {
            $('#chat_' + from_id + ' main').append(div_model);
        }
        $('.chat-window>main').animate({scrollTop: $(this).height()}, 300);
    }
    /**
     * 将消息内容添加到输出框中,并将滚动条滚动到最下方
     */
    function listMsg(data, type) {
        console.log(data);
//        var msg_list = document.getElementById("msg_list");
//        var msg = document.createElement("p");
//
//        msg.innerHTML = data;
//        msg_list.appendChild(msg);
//        msg_list.scrollTop = msg_list.scrollHeight;
        var name = data.substring(0, data.indexOf(':'));
        var now_time = (new Date()).toLocaleString();
        var chat_message = data.substring(data.indexOf(':') + 1);
        var div_model = `<div class="chat-message">
            <div><img src="{{asset('img/ww.jpg')}}" alt=""></div>
            <div class="chat-message-text">
                <div class="chat-message-meta-left">${name}  ${now_time}</div>
                <div class="chat-message-desc">${chat_message}</div>
            </div>
        </div>`;
        var div_model_self = `        <div class="chat-message-re">
            <div><img src="{{asset('img/ww.jpg')}}" alt=""></div>
            <div class="chat-message-text">
                <div class="chat-message-meta-right">${now_time} ${name}</div>
                <div class="chat-message-desc-re">${chat_message}</div>
            </div>
        </div>`;
        var div_model_system = `<div class="chat-state-mes">${data}</div>`;


        if (name == uname) {
            $('#chat_a main').append(div_model_self);
        } else {
            if (type != 'user') {

                $('#chat_a main').append(div_model_system);
            } else {
                $('#chat_a main').append(div_model);
            }
        }
        $('.chat-window>main').animate({scrollTop: $(this).height()}, 300);
    }

    /**
     * 处理用户登陆消息
     *
     * @param user_name 用户名
     * @param type  login/logout
     * @param name_list 用户列表
     */
    function dealUser(user_name, type, name_list) {
//        var user_list = document.getElementById("user_list");
//        var user_num = document.getElementById("user_num");
//        while(user_list.hasChildNodes()) {
//            user_list.removeChild(user_list.firstChild);
//        }
        $('.friend>div').remove();
        $('.chat-window-use').remove();
        $('.chat-now-use').remove();
        for (var index in name_list) {
//            var user = document.createElement("p");
//            user.innerHTML = name_list[index];
//            user_list.appendChild(user);
//            console.log(index+name_list[index]+uname);
            if (name_list[index] == uname) {
                uuid = index;
                continue;
            }
            var friend_model = `<div class="comment" onclick="open_chat(this)" id="${index}">
                <div><img src="{{asset('img/ww.jpg')}}" alt=""></div>
                <div>
                    <span class="chat-people-name">${name_list[index]}</span>
                    <p>什么都没留下</p>
                </div>
            </div>`;
            var chat_name = name_list[index];
            var chat_window = `<div class="chat-window chat-window-use" style="display: none" id="chat_${index}">
        <header>
            <div class="chat-window-img"><img src="{{asset('img/ww.jpg')}}" alt=""></div>
            <div class="chat-window-name"><span class="chat-people-name">${chat_name}</span></div>
            <div class="chat-window-meta">
                <span class="fa fa-window-minimize" onclick="chat_window_min()"></span>
                <span class="fa fa-window-maximize" onclick="chat_window_max(this)"></span>
                <span class="fa fa-times" onclick="chat_window_close()"></span>
            </div>
        </header>
        <main>
        </main>
        <footer>
            <div>
                <div class="chat-menus">
                    <div class="chat-menu"><span class="fa fa-smile-o"></span></div>
                    <div class="chat-menu"><span class="fa fa-image"></span></div>
                    <div class="chat-menu"><span class="fa fa-file-o"></span></div>
                </div>
                <div class="chat-recorder">
                    <span class="fa fa-clock-o">  聊天记录</span>
                </div>
            </div>
            <div class="chat-input">
                <textarea autofocus class="msg_box_private" onkeydown="confirm_private(event,this)" placeholder="按回车发送"></textarea>
            </div>
            <div class="chat-send">
                <a href="javascript:void(0);" onclick="send_private(this)">发送</a>
                <a href="javascript:void(0);">关闭</a>
            </div>
        </footer>
    </div>`;
            var chat_now = `<div class="chat-now chat-now-use chat-no-active" id="chat-now-${index}" onclick="tab_chat_window(this)">
            <div><img src="{{asset('img/ww.jpg')}}" alt=""></div>
            <div><span class="chat-people-name">${chat_name}</span></div>
            <div><span class="fa fa-times-circle" onclick="close_now_window(this,event)"></span></div>
        </div>`;
//            $('.friend').append(friend_model);
//            let new_window = $('#chat_0').clone(true);
//            new_window.attr('id','chat_'+num);
//            new_window.find('.chat-people-name').text(name_list[index]);
            $('.chat-windows').append(chat_window);
//
//            let new_tool_bar = $('#common-chat-0').clone(true);
//            new_tool_bar.attr('id','chat-now-'+num);
//            new_tool_bar.find('.chat-people-name').text(name_list[index]);
            $('.chat-window-toolbar').append(chat_now);
            $('.friend').append(friend_model);
            $('#common-chat-a').removeClass('chat-no-view').removeClass('chat-no-active').addClass('chat-active');
            $('#chat_a').show();
//            $('#chat-now-'+num+' .chat-people-name').text(name_list[index]);
//            $('#chat_'+num+' .chat-people-name').text(name_list[index]);
        }
        var change = type == 'login' ? '上线' : '下线';

        var data = '系统消息: ' + user_name + ' 已' + change;
        listMsg(data, 0);
    }

    /**
     * 将数据转为json并发送
     * @param msg
     */
    function sendMsg(msg) {
        var data = JSON.stringify(msg);
        ws.send(data);
    }

    /**
     * 生产一个全局唯一ID作为用户名的默认值;
     *
     * @param len
     * @param radix
     * @returns {string}
     */
    function uuid(len, radix) {
        var chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.split('');
        var uuid = [], i;
        radix = radix || chars.length;

        if (len) {
            for (i = 0; i < len; i++) uuid[i] = chars[0 | Math.random() * radix];
        } else {
            var r;

            uuid[8] = uuid[13] = uuid[18] = uuid[23] = '-';
            uuid[14] = '4';

            for (i = 0; i < 36; i++) {
                if (!uuid[i]) {
                    r = 0 | Math.random() * 16;
                    uuid[i] = chars[(i == 19) ? (r & 0x3) | 0x8 : r];
                }
            }
        }

        return uuid.join('');
    }
</script>