<div class="col-md-3 col-sm-3 hidden-xs">
    @foreach($leibies as $item)
        <div><a href="{{URL::route('category',['id'=>$item->id])}}">{{$item->leibie}}</a></div>
            @foreach($item->children as $v)
            <div><a href="{{URL::route('category',['id'=>$item->id])}}">&nbsp;&nbsp;{{$v->leibie}}</a></div>
            @endforeach
    @endforeach
</div>