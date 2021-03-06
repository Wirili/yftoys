<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{isset($page_title)?$page_title.' - ':''}}{{$C['web_title'] or '网站首页'}}</title>
    <meta name="keywords" content="{{$C['web_keys'] or ''}}">
    <meta name="description" content="{{$C['web_desc'] or ''}}">
    <!-- Styles -->
    <link href="{{asset('build/common/css/bootstrap.min.css')}}" rel="stylesheet" type='text/css'>
    <link href="{{asset('build/common/css/font-awesome.min.css')}}" rel="stylesheet" type='text/css'>

    <link href="{{ elixir('default/css/default.css') }}" rel="stylesheet" type='text/css'>

    <!-- JavaScripts -->
    <script src="{{asset('build/common/js/jquery-1.12.3.min.js')}}"></script>
    <script src="{{asset('build/common/js/jquery.json.js')}}"></script>
    <script src="{{asset('build/common/js/bootstrap.min.js')}}"></script>
    <!-- 背景图 -->
    <script src="{{asset('build/common/plugin/backstretch/jquery.backstretch.min.js')}}"></script>
    <!-- end -->

    <!-- layer -->
    <link href="{{asset('build/common/plugin/layer/skin/layer.css')}}" rel="stylesheet" type='text/css'>
    <script src="{{asset('build/common/plugin/layer/layer.js')}}"></script>
    <!-- end layer -->

    <!-- swiper -->
    <link href="{{asset('build/common/plugin/swiper/swiper.css')}}" rel="stylesheet" type='text/css'>
    <script src="{{asset('build/common/plugin/swiper/swiper.js')}}"></script>
    <!-- end swiper -->

    <!-- bootstrap treeview -->
    <link href="{{asset('build/common/plugin/bootstrap-treeview/bootstrap-treeview.min.css')}}" rel="stylesheet" type='text/css'>
    <script src="{{asset('build/common/plugin/bootstrap-treeview/bootstrap-treeview.min.js')}}"></script>
    <!-- end layer -->

    <!-- isotope s -->
    <script src="{{asset('build/common/plugin/isotope/isotope.pkgd.min.js')}}"></script>
    <!-- isotope e -->
    <!-- layerslider s -->
    <link href="{{asset('build/common/plugin/layerslider/css/layerslider.css')}}" rel="stylesheet" type='text/css'>
    <script src="{{asset('build/common/plugin/layerslider/js/greensock.js')}}"></script>
    <script src="{{asset('build/common/plugin/layerslider/js/layerslider.transitions.js')}}"></script>
    <script src="{{asset('build/common/plugin/layerslider/js/layerslider.kreaturamedia.jquery.js')}}"></script>
    <!-- layerslider e -->

    <script src="{{asset('build/default/js/app.js')}}"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->
    @yield('header')
</head>
<body>
<header>
    <div class="container">
        <img src="#" alt="">
    </div>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{URL::route('index')}}">Brand</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="{{URL::route('index')}}">@lang('home.index')</a></li>
                    <li><a href="{{URL::route('goods',['lang'=>'cn'])}}">@lang('home.goods')</a></li>
                    <li><a href="{{URL::route('about')}}">@lang('home.about')</a></li>
                    <li><a href="{{URL::route('contact')}}">@lang('home.contact')</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">@lang('auth.button.login')</a></li>
                        <li><a href="{{ url('/register') }}">@lang('auth.button.register')</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        @lang('auth.button.logout')
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="@lang('home.keyword')">
                            <a type="submit" class="input-group-addon">@lang('home.search')</a>
                        </div>
                    </div>
                </form>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>

<div class="container-fluid">
    <div id="layerslider" style="width:1280px;height:490px;max-width:1280px;">
        <div class="ls-slide" data-ls="slidedelay:4500; transition2d: all;">
            <img src="/picture/20161221515467674.jpg" class="ls-bg" alt="Slide background"/>
        </div>
        <div class="ls-slide" data-ls="slidedelay:3300; transition2d: all;">
            <img src="/picture/20161221515467684.jpg" class="ls-bg" alt="Slide background"/>
        </div>
        <div class="ls-slide" data-ls="slidedelay:2000; transition2d: all;">
            <img src="/picture/201607051515467674.jpg" class="ls-bg" alt="Slide background"/>
        </div>
    </div>
</div>
<script>
    $(function () {
        $("#layerslider").layerSlider({
            skin : 'v6',
            hoverPrevNext : true,
            responsive : true,
            responsiveUnder : 1280,
            thumbnailNavigation : false,
            sublayerContainer : 1280,
            skinsPath: '/build/common/plugin/layerslider/skins/'
        });
    });
</script>
@yield('content')
@yield('footer')
<footer>
    <div class="container">{!! isset($C['icp'])&&!empty($C['icp'])?'<a href="www.miitbeian.gov.cn">'.$C['icp'].'</a>':'' !!} &copy; 版权所有</div>
</footer>
</body>
</html>
