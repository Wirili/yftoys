@extends('admin.layout')

@section('content')
    @include('admin.header')
<div class="content">
    <form class="form-horizontal" role="form" method="POST" action="{{ URL::route('admin.role.save') }}">
        <div class="nav-tabs-custom">
                {!! csrf_field() !!}
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">@lang('role.tab_basic')</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content" style="margin-top: 8px;">
                <div role="tabpanel" class="tab-pane active" id="home">
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="display_name">@lang('role.display_name')</label>
                        <div class="col-md-4"><input type="text" class="form-control input-sm" name="display_name" id="display_name" value="{{$role->display_name}}"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="name">@lang('role.name')</label>
                        <div class="col-md-4"><input type="text" class="form-control input-sm" name="name" id="name" value="{{$role->name}}"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="description">@lang('role.description')</label>
                        <div class="col-md-4"><input type="text" class="form-control input-sm" name="description" id="description" value="{{$role->description}}"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">@lang('role.permission')</label>
                        <div class="col-md-6">
                            <div class="checkbox"><label style="margin:0 0 7px 10px ;"><input id="select_all" type="checkbox">全选</label></div>
                            <table class="table table-bordered">
                                @foreach($permission as $item)
                                <tr data-permission="{{$item->id}}">
                                    <td style="background: #f9f9f9;"><label class="checkbox-inline"><input type="checkbox" name="data[]" data-parent="{{$item->id}}"  id="{{$item->name}}" value="{{$item->id}}" @if(isset($perms[$item->id])) checked @endif>{{$item->display_name}}</label></td>
                                    <td>
                                        @foreach($item->children as $child)
                                            <label class="checkbox-inline" style="width:120px;"><input type="checkbox" name="data[]" data-child="{{$child->id}}" id="{{$child->name}}" value="{{$child->id}}" @if(isset($perms[$child->id])) checked @endif>{{$child->display_name}}</label>
                                        @endforeach
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center" style="padding: 10px 0; border-top: 1px solid #f4f4f4;">
                <input type="hidden" name="id" value="{{$role->id}}">
                <input type="submit" class="btn btn-primary" value="@lang('basic.submit')">
                <input type="reset" class="btn btn-default" value="@lang('basic.reset')">
            </div>
        </div>
    </form>
</div>
<script>
    //全选
    $(function(){
        select_all();
        $('#select_all').on('click', function () {
            var me = this;
            $("input[name='data[]']").each(function () {
                this.checked = me.checked;
            })
        });
        //子权限
        $('tr[data-permission]').on('click', 'input[data-child]', function (parent) {
            if (this.checked)
                $(parent.delegateTarget).find('input[data-parent]')[0].checked = true;
            select_all();
        })
        //父权限
        $('tr[data-permission]').on('click', 'input[data-parent]', function (parent) {
            var me = this;
            $(parent.delegateTarget).find('input[data-child]').each(function () {
                this.checked = me.checked;
            })
            select_all();
        })
    })
    function select_all(){
        var all = true;
        $("input[name='data[]']").each(function () {
            if (this.checked == false) {
                all = false;
                return false;
            }
        })
        $('#select_all')[0].checked = all;
    }
</script>
    @include('admin.footer')
@endsection