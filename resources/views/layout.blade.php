<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<header>
    @section('header')
        头部
    @show
</header>
<main>
    @yield('main','mian')
</main>
<footer>
    @section('footer')
        尾部
    @show
</footer>
</body>
</html>