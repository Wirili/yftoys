@extends('admin.layout')

@section('content')
    @include('admin.header')
<div class="content">
    <form class="form-horizontal" role="form" method="POST" action="{{ URL::route('admin.user.save') }}" enctype="multipart/form-data">
        <div class="nav-tabs-custom">
                {!! csrf_field() !!}
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">@lang('user.tab_basic')</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content" style="margin-top: 8px;">
                <div role="tabpanel" class="tab-pane active" id="home">
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="name">@lang('user.name')</label>
                        <div class="col-md-4"><input type="text" class="form-control input-sm" name="name" id="name"  value="{{$user->name}}"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="fullname">@lang('user.fullname')</label>
                        <div class="col-md-4"><input class="form-control input-sm" name="fullname" id="fullname" value="{{$user->fullname}}"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="password">@lang('user.password')</label>
                        <div class="col-md-4"><input type="password" class="form-control input-sm" name="password" id="password"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="is_check">@lang('user.is_check')</label>
                        <div class="col-md-4">
                            <select class="form-control" name="is_check" id="is_check">
                                @foreach(trans('user.check_option') as $key => $value)
                                    <option value="{{$key}}" @if($value==$user->is_check) selected @endif>{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="email">@lang('user.email')</label>
                        <div class="col-md-4"><input class="form-control input-sm" name="email" id="email" value="{{$user->email}}"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" >@lang('user.login_count')</label>
                        <div class="col-md-4"><p class="form-control-static">{{$user->login_count}}</p></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" >@lang('user.last_time')</label>
                        <div class="col-md-4"><p class="form-control-static">{{$user->last_time}}</p></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" >@lang('user.last_ip')</label>
                        <div class="col-md-4"><p class="form-control-static">{{$user->last_ip}}</p></div>
                    </div>
                </div>
            </div>
            <div class="text-center" style="padding: 10px 0; border-top: 1px solid #f4f4f4;">
                <input type="hidden" name="id" value="{{$user->user_id}}">
                <input type="submit" class="btn btn-primary" value="@lang('basic.submit')">
                <input type="reset" class="btn btn-default" value="@lang('basic.reset')">
            </div>
        </div>
    </form>
</div>
    @include('admin.footer')
@endsection