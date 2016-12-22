@extends('admin.layout')

@section('content')
    @include('admin.header')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-body">
                        <table id="dt" class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr align="center">
                                <th class="text-center" width="120">@lang('cat.id')</th>
                                <th class="text-center">@lang('cat.leibie')</th>
                                <th class="text-center">@lang('cat.ywleibie')</th>
                                <th class="text-center" width="100">@lang('basic.handle')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($list as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->leibei}}</td>
                                    <td>{{$item->ywleibie}}</td>
                                    <td>
                                        <a href='{{URL::route('admin.cat.edit',['id'=>$item->cat_id])}}' data-toggle='tooltip' data-placement='bottom' title='@lang('basic.edit')' style='padding:0 5px;'><i class='fa fa-edit'></i></a>
                                        <a href='{{URL::route('admin.cat.del',['id'=>$item->cat_id])}}' class='text-danger' data-toggle='tooltip' data-placement='bottom' title='@lang('basic.del')' style='padding:0 5px;'><i class='fa fa-remove'></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">暂无记录</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{$list->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--<script>--}}
        {{--$(function () {--}}
            {{--var table = $('#dt').on('draw.dt',function(e, settings){--}}
                {{--$('[data-toggle="tooltip"]').tooltip();--}}
            {{--})--}}
            {{--.DataTable({--}}
                {{--dom:"<'row'<'col-sm-12'l>><'row'<'col-sm-12'tr>><'row'<'col-sm-5'i><'col-sm-7'p>>",--}}
                {{--pagingType: "full_numbers",--}}
                {{--pageLength: 10,--}}
                {{--autoWidth: false,--}}
                {{--processing: true,--}}
                {{--serverSide: true,--}}
                {{--lengthChange: true,--}}
                {{--searching: false,--}}
                {{--stateSave: true,--}}
                {{--ajax: {--}}
                    {{--type:'POST',--}}
                    {{--url: "{{URL::route('admin.cat.ajax',['_token'=>csrf_token()])}}"--}}
                {{--},--}}
                {{--columns: [--}}
                    {{--{data: 'id',className:'text-center'},--}}
                    {{--{data: 'leibie'},--}}
                    {{--{data: 'ywleibie'},--}}
                    {{--{--}}
                        {{--data: 'id',--}}
                        {{--className: 'text-center',--}}
                        {{--orderable: false,--}}
                        {{--render: function (data, type, row) {--}}
                            {{--data = "<a href='/admin/cat/edit/" + data + "' data-toggle='tooltip' data-placement='bottom' title='@lang('basic.edit')' style='padding:0 5px;'><i class='fa fa-edit'></i></a>"--}}
                                    {{--+ "<a href='/admin/cat/del/" + data + "' class='text-danger' data-toggle='tooltip' data-placement='bottom' title='@lang('basic.del')' style='padding:0 5px;'><i class='fa fa-remove'></i></a>";--}}
                            {{--return data;--}}
                        {{--}--}}
                    {{--}--}}
                {{--],--}}
                {{--order: [[0, "desc"]]--}}
            {{--});--}}
            {{--$('#dt_length').append("<a class='btn btn-primary pull-right' href='{{URL::route('admin.cat.create')}}'>@lang('cat.create')</a>");--}}
        {{--});--}}
    {{--</script>--}}
@endsection