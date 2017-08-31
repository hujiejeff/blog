@extends('layouts.admin')
@section('main')
    <div class="row-fluid">
        <div class="widget widget-padding span12">
            <div class="widget-header">
                <i class="icon-reorder"></i>
                <h5>所有分类</h5>
                <div class="widget-buttons">
                    <a href="http://www.datatables.net/usage/" data-title="Documentation" class="tip" target="_blank"
                       data-original-title=""><i class="icon-external-link"></i></a>
                    <a href="#" data-title="Collapse" data-collapsed="false" class="tip collapse"
                       data-original-title=""><i class="icon-chevron-up"></i></a>
                </div>
            </div>
            <div class="widget-body">
                <div id="users_wrapper" class="dataTables_wrapper form-inline" role="grid">
                    <div class="row-fluid">
                        <div class="span6">
                            <div id="users_length" class="dataTables_length">
                                <label>Entries:
                                    <select size="1"
                                            name="users_length"
                                            aria-controls="users">
                                        <option value="10" selected="selected">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                </label>
                                <a href="{{route('cat_create')}}" class="btn btn-success pull-right">新建</a>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="dataTables_filter" id="users_filter"><label>Search: <input type="text"
                                                                                                   aria-controls="users"></label>
                            </div>
                        </div>
                    </div>
                    <table id="users" class="table table-striped table-bordered dataTable"
                           aria-describedby="users_info">
                        <thead>
                        <tr role="row">
                            <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="users" rowspan="1"
                                colspan="1" aria-sort="ascending" aria-label="User: activate to sort column descending"
                                style="">id
                            </th>
                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="users" rowspan="1"
                                colspan="1" aria-label="Registered: activate to sort column ascending"
                                style="width: 238px;">分类名
                            </th>
                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="users" rowspan="1"
                                colspan="1" aria-label="Status: activate to sort column ascending"
                                style="width: 182px;">所属文章数
                            </th>
                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="users" rowspan="1"
                                colspan="1" aria-label="Status: activate to sort column ascending"
                                style="width: 182px;">更新时间
                            </th>
                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="users" rowspan="1"
                                colspan="1" aria-label="Status: activate to sort column ascending"
                                style="width: 182px;">发布时间
                            </th>
                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="users" rowspan="1"
                                colspan="1" aria-label=": activate to sort column ascending" style="">
                            </th>
                        </tr>
                        </thead>

                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                        @foreach($cats as $cat)
                            <tr class="odd">
                                <td class="  sorting_1">{{$cat->id}}</td>
                                <td class=" ">{{$cat->name}}</td>
                                <td class=" ">{{$cat->articles->count()}}</td>
                                <td>{{$cat->updated_at}}</td>
                                <td>{{$cat->created_at}}</td>
                                <td class=" ">
                                    <div class="btn-group">
                                        <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#">
                                            操作
                                            <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="{{url('cat/'.$cat->id)}}"><i class="icon-eye-open"></i>
                                                    查看</a></li>
                                            <li><a href="{{route('cat_update',['id' => $cat->id])}}"><i
                                                            class="icon-edit"></i> 更新</a></li>
                                            <li><a href="#" class="demo_notify_dialog" datatype="confirm" onclick="event.preventDefault();
                                        document.getElementById('delete-form').submit();"><i class="icon-trash"></i> 删除</a>
                                                <form id="delete-form" action="{{route('cat_delete',['id' => $cat->id])}}" style="display: none" method="post">
                                                    {{csrf_field()}}
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="row-fluid">
                        <div class="span6">
                            <div class="dataTables_info" id="users_info">Showing 1 to 8 of 8 entries</div>
                        </div>
                        <div class="span6">
                            <div class="dataTables_paginate paging_bootstrap pagination">
                                <ul>
                                    <li class="prev disabled"><a href="#">← Previous</a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li class="next disabled"><a href="#">Next → </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /widget-body -->
        </div> <!-- /widget -->
    </div>
@endsection