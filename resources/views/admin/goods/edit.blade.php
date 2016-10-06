@extends('admin.layout')

@section('content')
    @include('admin.header')
<div class="content">
    <form class="form-horizontal" role="form" method="POST" action="{{ URL::route('admin.goods.save') }}" enctype="multipart/form-data">
        <div class="nav-tabs-custom">
                {!! csrf_field() !!}
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">@lang('goods.tab_basic')</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content" style="margin-top: 8px;">
                <div role="tabpanel" class="tab-pane active" id="home">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="id">@lang('goods.bianhao')</label>
                                <div class="col-md-8">
                                    @if(isset($goods->bianhao))
                                    <p class="form-control-static">{{$goods->bianhao}}</p>
                                    @else
                                        <input type="text" id="id" class="form-control input-sm" name="id" >
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="pinming">@lang('goods.pinming')</label>
                                <div class="col-md-8"><input type="text" id="pinming" class="form-control input-sm" name="pinming"  value="{{$goods->pinming}}"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="epinming">@lang('goods.epinming')</label>
                                <div class="col-md-8"><input type="text" id="epinming" class="form-control input-sm" name="epinming"  value="{{$goods->epinming}}"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="changjiahh">@lang('goods.changjiahh')</label>
                                <div class="col-md-8"><input type="text" id="changjiahh" class="form-control input-sm" name="changjiahh"  value="{{$goods->changjiahh}}"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="leibieid">@lang('goods.leibieid')</label>
                                <div class="col-md-8">
                                    <select id="leibieid" class="form-control input-sm" name="leibieid">
                                        <option value="">@lang('goods.pls')</option>
                                        @foreach($cat as $item)
                                            <option value="{{$item->id}}" @if($item->id==$goods->leibieid) selected @endif>{{$item->leibie}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="cat_id">@lang('goods.baozhuangfs')</label>
                                <div class="col-md-8">
                                    <select id="baozhuangfs" class="form-control input-sm" name="baozhuangfs">
                                        <option value="0">@lang('goods.pls')</option>
                                        @foreach($bz as $item)
                                            <option value="{{$item->baozhuangfs}}" @if($item->baozhuangfs==$goods->baozhuangfs) selected @endif>{{$item->baozhuangfs}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="cat_id">@lang('goods.danwei')</label>
                                <div class="col-md-8">
                                    <select id="danwei" class="form-control input-sm" name="danwei">
                                        <option value="0">@lang('goods.pls')</option>
                                        @foreach($dw as $item)
                                            <option value="{{$item->yangpindw}}" @if($item->yangpindw==$goods->danwei) selected @endif>{{$item->yangpindw}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="neiheshu_w">@lang('goods.neiheshu_w')</label>
                                <div class="col-md-8"><input type="text" id="neiheshu_w" class="form-control input-sm" name="neiheshu_w" value="{{$goods->neiheshu_w}}"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="dashu_w">@lang('goods.dashu_w')</label>
                                <div class="col-md-8"><input type="text" id="dashu_w" class="form-control input-sm" name="dashu_w" value="{{$goods->dashu_w}}"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="meijianshu_w">@lang('goods.meijianshu_w')</label>
                                <div class="col-md-8"><input type="text" id="meijianshu_w" class="form-control input-sm" name="meijianshu_w" value="{{$goods->meijianshu_w}}"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="ypchang">@lang('goods.ypchang')</label>
                                <div class="col-md-8"><input type="text" id="ypchang" class="form-control input-sm" name="ypchang" value="{{$goods->ypchang}}"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="ypkuan">@lang('goods.ypkuan')</label>
                                <div class="col-md-8"><input type="text" id="ypkuan" class="form-control input-sm" name="ypkuan" value="{{$goods->ypkuan}}"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="ypgao">@lang('goods.ypgao')</label>
                                <div class="col-md-8"><input type="text" id="ypgao" class="form-control input-sm" name="ypgao" value="{{$goods->ypgao}}"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="ggchang_w">@lang('goods.ggchang_w')</label>
                                <div class="col-md-8"><input type="text" id="ggchang_w" class="form-control input-sm" name="ggchang_w" value="{{$goods->ggchang_w}}"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="ggkuan_w">@lang('goods.ggkuan_w')</label>
                                <div class="col-md-8"><input type="text" id="ggkuan_w" class="form-control input-sm" name="ggkuan_w" value="{{$goods->ggkuan_w}}"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="gggao_w">@lang('goods.gggao_w')</label>
                                <div class="col-md-8"><input type="text" id="gggao_w" class="form-control input-sm" name="gggao_w" value="{{$goods->gggao_w}}"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="maozhong_w">@lang('goods.maozhong_w')</label>
                                <div class="col-md-8"><input type="text" id="maozhong_w" class="form-control input-sm" name="maozhong_w" value="{{$goods->maozhong_w}}"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="jingzhong_w">@lang('goods.jingzhong_w')</label>
                                <div class="col-md-8"><input type="text" id="jingzhong_w" class="form-control input-sm" name="jingzhong_w" value="{{$goods->jingzhong_w}}"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="description">@lang('goods.lururq_w')</label>
                                <div class="col-md-8"><p class="form-control-static">{{$goods->lururq_w}}</p></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <img src="{{\App\models\Yangpinzl::getTuyang($goods->tuyang)}}" alt="" style="width:100%;border:1px solid #ccc;">
                            </div>
                            <div class="form-group">
                                <input type="file" name="upload">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center" style="padding: 10px 0; border-top: 1px solid #f4f4f4;">
                @if(isset($goods->bianhao))
                <input type="hidden" name="id"  value="{{$goods->bianhao}}">
                @endif
                <input type="submit" class="btn btn-primary" value="@lang('basic.submit')">
                <input type="reset" class="btn btn-default" value="@lang('basic.reset')">
            </div>
        </div>
    </form>
</div>
    @include('admin.footer')
@endsection