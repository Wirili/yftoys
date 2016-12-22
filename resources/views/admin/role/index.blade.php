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
                                <th class="text-center">@lang('role.display_name')</th>
                                <th class="text-center">@lang('role.name')</th>
                                <th class="text-center">@lang('role.description')</th>
                                <th class="text-center" width="100">@lang('basic.handle')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($list as $item)
                                <tr>
                                    <td class="text-center">{{$item->id}}</td>
                                    <td>{{$item->display_name}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->description}}</td>
                                    <td class="text-center">
                                        <a href='{{URL::route('admin.role.edit',['id'=>$item->id])}}' data-toggle='tooltip' data-placement='bottom' title='@lang('basic.edit')' style='padding:0 5px;'><i class='fa fa-edit'></i></a>
                                        <a href='{{URL::route('admin.role.del',['id'=>$item->id])}}' class='text-danger' data-toggle='tooltip' data-placement='bottom' title='@lang('basic.del')' style='padding:0 5px;'><i class='fa fa-remove'></i></a>
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