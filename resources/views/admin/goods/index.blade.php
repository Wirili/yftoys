@extends('admin.layout')

@section('content')
    @include('admin.header')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                        <form action="" class="form-inline pull-right">
                            <div class="form-group">
                                <input class="form-control input-sm" type="text" placeholder="关键字"> <button class="btn btn-primary btn-sm" type="submit">查询</button>
                            </div>
                        </form>
                    </div>
                    <div class="box-body">
                        <table id="dt" class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr align="center">
                                <th class="text-center" width="120">@lang('basic.id')</th>
                                <th class="text-center">@lang('goods.pinming')</th>
                                <th class="text-center" width="120">@lang('goods.leibieid')</th>
                                <th class="text-center" width="80">@lang('goods.is_best')</th>
                                <th class="text-center" width="80">@lang('goods.is_hot')</th>
                                <th class="text-center" width="120">@lang('goods.lururq_w')</th>
                                <th class="text-center" width="100">@lang('basic.handle')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($list as $item)
                            <tr>
                                <td>{{$item->bianhao}}</td>
                                <td>{{$item->pinming}}</td>
                                <td>{{$item->category->leibei or ''}}</td>
                                <td class="text-center">
                                    @if($item->is_best)
                                        <i class='fa fa-check text-success' data-best-id='{{$item->bianhao}}'></i>
                                    @else
                                        <i class='fa fa-close text-danger' data-hot-id='{{$item->bianhao}}'></i>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($item->is_hot)
                                        <i class='fa fa-check text-success' data-best-id='{{$item->bianhao}}'></i>
                                    @else
                                        <i class='fa fa-close text-danger' data-hot-id='{{$item->bianhao}}'></i>
                                    @endif
                                </td>
                                <td class="text-center">{{$item->lururq_w}}</td>
                                <td class="text-center">
                                    <a href='{{URL::route('admin.goods.edit',['id'=>$item->bianhao])}}' data-toggle='tooltip' data-placement='bottom' title='@lang('basic.edit')' style='padding:0 5px;'><i class='fa fa-edit'></i></a>
                                    <a href='{{URL::route('admin.goods.edit',['id'=>$item->bianhao])}}' class='text-danger' data-toggle='tooltip' data-placement='bottom' title='@lang('basic.del')' style='padding:0 5px;'><i class='fa fa-remove'></i></a>
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
@endsection