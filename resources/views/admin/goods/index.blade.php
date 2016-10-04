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
                                <th class="text-center">@lang('goods.pinming')</th>
                                <th class="text-center" width="80">@lang('goods.leibie')</th>
                                <th class="text-center" width="40">@lang('goods.is_best')</th>
                                <th class="text-center" width="40">@lang('goods.is_hot')</th>
                                <th class="text-center" width="80">@lang('goods.lururq_w')</th>
                                <th class="text-center" width="100">@lang('basic.handle')</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            var table = $('#dt').on('draw.dt',function(e, settings){
                $('[data-toggle="tooltip"]').tooltip();
            })
            .DataTable({
                dom:"<'row'<'col-sm-12'l>><'row'<'col-sm-12'tr>><'row'<'col-sm-5'i><'col-sm-7'p>>",
                pagingType: "full_numbers",
                pageLength: 10,
                autoWidth: false,
                processing: true,
                serverSide: true,
                lengthChange: true,
                searching: false,
                stateSave: true,
                ajax: {
                    type:'POST',
                    url: "{{URL::route('admin.goods.ajax',['_token'=>csrf_token()])}}"
                },
                columns: [
                    {data: 'bianhao',className:'text-center'},
                    {data: 'pinming'},
                    {data: 'leibieid'},
                    {
                        data: 'is_best',
                        className: 'text-center',
                        render:function(data,type,row){
                            if(data==0)
                                return "<i class='fa fa-close text-danger'><i>";
                            return "<i class='fa fa-check text-success'><i>";
                        }
                    },
                    {
                        data: 'is_hot',
                        className: 'text-center',
                        render:function(data,type,row){
                            if(data==0)
                                return "<i class='fa fa-close text-danger'><i>";
                            return "<i class='fa fa-check text-success'><i>";
                        }
                    },
                    {data: 'lururq_w'},
                    {
                        data: 'bianhao',
                        className: 'text-center',
                        orderable: false,
                        render: function (data, type, row) {
                            data = "<a href='/admin/goods/edit/" + data + "' data-toggle='tooltip' data-placement='bottom' title='@lang('basic.edit')' style='padding:0 5px;'><i class='fa fa-edit'></i></a>"
                                    + "<a href='/admin/goods/del/" + data + "' class='text-danger' data-toggle='tooltip' data-placement='bottom' title='@lang('basic.del')' style='padding:0 5px;'><i class='fa fa-remove'></i></a>";
                            return data;
                        }
                    }
                ],
                order: [[0, "desc"]]
            });
            $('#dt_length').append("<a class='btn btn-primary pull-right' href='{{URL::route('admin.goods.create')}}'>@lang('goods.create')</a>");
        });
    </script>
@endsection