@extends('admin.layout')

@section('content')
    @include('admin.header')
<div class="content">
    <form class="form-horizontal" role="form" method="POST" action="{{ URL::route('admin.cat.save') }}" enctype="multipart/form-data">
        <div class="nav-tabs-custom">
                {!! csrf_field() !!}
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">@lang('cat.tab_basic')</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content" style="margin-top: 8px;">
                <div role="tabpanel" class="tab-pane active" id="home">
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="id">@lang('cat.id')</label>
                        <div class="col-md-4">
                            @if(!$cat->id)
                            <input type="text" id="id" class="form-control input-sm" name="id"  value="{{$cat->id}}">
                            @else
                                <p class="form-control-static">{{$cat->id}}</p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="leibie">@lang('cat.leibie')</label>
                        <div class="col-md-4"><input type="text" id="leibie" class="form-control input-sm" name="leibie"  value="{{$cat->leibie}}"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="ywleibie">@lang('cat.ywleibie')</label>
                        <div class="col-md-4"><input type="text" id="ywleibie" class="form-control input-sm" name="ywleibie"  value="{{$cat->ywleibie}}"></div>
                    </div>
                </div>
            </div>
            <div class="text-center" style="padding: 10px 0; border-top: 1px solid #f4f4f4;">
                <input type="hidden" name="id" value="{{$cat->id}}">
                <input type="submit" class="btn btn-primary" value="@lang('basic.submit')">
                <input type="reset" class="btn btn-default" value="@lang('basic.reset')">
            </div>
        </div>
    </form>
</div>
    @include('admin.footer')
@endsection