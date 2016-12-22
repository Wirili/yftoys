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
                                <th class="text-center" width="60">@lang('basic.id')</th>
                                <th class="text-center">@lang('admin.name')</th>
                                <th class="text-center">@lang('admin.email')</th>
                                <th class="text-center" width="100">@lang('basic.handle')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($list as $item)
                                <tr>
                                    <td class="text-center">{{$item->user_id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td class="text-center">{{$item->email}}</td>
                                    <td class="text-center">
                                        <a href='{{URL::route('admin.admin.edit',['id'=>$item->user_id])}}' data-toggle='tooltip' data-placement='bottom' title='@lang('basic.edit')' style='padding:0 5px;'><i class='fa fa-edit'></i></a>
                                        <a href='{{URL::route('admin.admin.del',['id'=>$item->user_id])}}' class='text-danger' data-toggle='tooltip' data-placement='bottom' title='@lang('basic.del')' style='padding:0 5px;'><i class='fa fa-remove'></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">暂无记录</td>
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
@endsection