@extends('layouts.admin')
@section('main')
    <form class="form-horizontal" method="post" action="{{url()->current()}}">
        <div class="control-group">
            <label class="control-label">标签名</label>
            <div class="controls">
                <input type="text" class="focused" name="name" value="@if($action == 'update') {{$tag->name}}@endif">
                {{csrf_field()}}
                <input type="submit" class="btn btn-primary">
            </div>
        </div>
    </form>
@endsection