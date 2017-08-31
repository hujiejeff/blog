@extends('layouts/admin')
@section('css')
    {{--<link rel="stylesheet" href="{{asset('editor.md-master/examples/css/style.css')}}">--}}
    <link href="{{asset('css/select2.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('editor.md-master/css/editormd.css')}}">
    <style>
        .editormd-toolbar {
            z-index: 1031;
            /*top: 45px;*/
            /*left: 200px !important;*/
        }
    </style>
@endsection
@section('main')
    <div class="create">
        <form action="{{url()->current()}}" method="post" class="form-horizontal">
            {{csrf_field()}}
            <div class="control-group">
                <label class="control-label">标题</label>
                <div class="controls">
                    <input class="span3" name="title" type="text" value="@if($action=='update'){{$article['title']}}@endif">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">分类</label>
                <div class="controls">
                    <select class="span3" name="cat_id">
                        @foreach($cats as $cat)
                            <option value="{{$cat['id']}}"
                                    @if($action == 'update' && $article['cat_id'] == $cat['id'])
                                    selected
                                    @endif
                            >{{$cat['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">标签</label>
                <div class="controls">
                    @foreach($tags as $tag)
                    <label class="checkbox">
                        <input type="checkbox" value="{{$tag['id']}}" name="tags[]"
                        @if(in_array($tag['id'],$tagss))
                            checked
                        @endif
                        >
                        {{$tag['name']}}
                    </label>
                        @endforeach
                </div>
            </div>
            <div id="layout" style="position: relative">
                <div id="test-editormd">
                <textarea style="display:none;" name="content">
                    @unless($action == 'update')
                    [TOC]

#### Disabled options

- TeX (Based on KaTeX);
- Emoji;
- Task lists;
- HTML tags decode;
- Flowchart and Sequence Diagram;

#### Editor.md directory

    editor.md/
            lib/
            css/
            scss/
            tests/
            fonts/
            images/
            plugins/
            examples/
            languages/
            editormd.js
            ...

```html
&lt;!-- English --&gt;
&lt;script src="../dist/js/languages/en.js"&gt;&lt;/script&gt;

&lt;!-- 繁體中文 --&gt;
&lt;script src="../dist/js/languages/zh-tw.js"&gt;&lt;/script&gt;
```
                        @else
                    {{$article['content']}}
                        @endunless
</textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" style="background-color: #337ab7">
                提交
            </button>
        </form>
    </div>
    <div id="my"></div>
@endsection
@section('js')
    <script src="{{asset('editor.md-master/examples/js/jquery.min.js')}}"></script>
    <script src="{{asset('editor.md-master/editormd.js')}}"></script>
    <script>
        var testEditor;

        $(function () {
            testEditor = editormd("test-editormd", {
                width: "90%",
                height: 640,
                syncScrolling: "single",
                path: "{{asset('editor.md-master')}}/lib/"
            });
            var html_my = testEditor.html5('```html\
            &lt;!-- English --&gt;\
            &lt;script src="../dist/js/languages/en.js"&gt;&lt;/script&gt;\
\
            &lt;!-- 繁體中文 --&gt;\
            &lt;script src="../dist/js/languages/zh-tw.js"&gt;&lt;/script&gt;\
            ```');
            var mye = document.getElementById('my');
            mye.html(html_my);
            /*
             // or
             testEditor = editormd({
             id      : "test-editormd",
             width   : "90%",
             height  : 640,
             path    : "../lib/"
             });
             */
        });
    </script>
@endsection