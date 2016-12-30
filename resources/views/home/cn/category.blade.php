@extends('home.layout')

@section('content')
    <div class="container">
        <div class="row">
            @include('home.leibie')
            <div class="col-md-9 col-sm-9">
                <div class="row isotope">
                    @forelse($goods as $good)
                        <div class="col-md-3 col-sm-6 col-xs-12 isotope-item">
                            <img src="{{\App\models\Yangpinzl::getTuyang($good->tuyang)}}" alt="" width="100%">
                            <div>{{$good->bianhao}}</div>
                            <div>{{$good->pinming}}</div>
                        </div>
                    @empty
                        <div class="col-md-12 text-center">没有数据</div>
                    @endforelse
                </div>
                <div class="row">
                    <div class="col-md-12 text-right">{{$goods->links()}}</div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        $(window).load(function(){
            $('.isotope').isotope({
                itemSelector: '.isotope-item'
            });
        });
    </script>
@endsection